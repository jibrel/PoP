<?php

declare(strict_types=1);

namespace PoPSchema\CustomPostsWP\TypeAPIs;

use PoPSchema\CustomPosts\ComponentConfiguration;
use PoPSchema\CustomPosts\TypeAPIs\AbstractCustomPostTypeAPI as UpstreamAbstractCustomPostTypeAPI;
use PoPSchema\CustomPosts\TypeHelpers\CustomPostUnionTypeHelpers;
use PoPSchema\CustomPosts\Types\Status;
use PoPSchema\CustomPostsWP\TypeAPIs\CustomPostTypeAPIHelpers;
use PoPSchema\CustomPostsWP\TypeAPIs\CustomPostTypeAPIUtils;
use PoPSchema\SchemaCommons\DataLoading\ReturnTypes;
use PoPSchema\SchemaCommons\Constants\QueryOptions;
use WP_Post;

use function get_post_status;

/**
 * Methods to interact with the Type, to be implemented by the underlying CMS
 */
abstract class AbstractCustomPostTypeAPI extends UpstreamAbstractCustomPostTypeAPI
{
    public const HOOK_QUERY = __CLASS__ . ':query';

    /**
     * Return the post's ID
     */
    public function getID(object $customPost): string | int
    {
        return $customPost->ID;
    }

    public function getStatus(string | int | object $customPostObjectOrID): ?string
    {
        $status = get_post_status($customPostObjectOrID);
        return CustomPostTypeAPIUtils::convertPostStatusFromCMSToPoP($status);
    }

    /**
     * If the "status" is not passed, then it's always "publish"
     *
     * @return array<string, mixed>
     */
    public function getCustomPostQueryDefaults(): array
    {
        return [
            'status' => [
                Status::PUBLISHED,
            ],
        ];
    }

    /**
     * @param array<string, mixed> $query
     * @param array<string, mixed> $options
     * @return object[]
     */
    public function getCustomPosts(array $query, array $options = []): array
    {
        $query = $this->convertCustomPostsQuery($query, $options);
        return (array) \get_posts($query);
    }
    public function getCustomPostCount(array $query = [], array $options = []): int
    {
        // Convert parameters
        $options[QueryOptions::RETURN_TYPE] = ReturnTypes::IDS;
        $query = $this->convertCustomPostsQuery($query, $options);

        // All results, no offset
        $query['posts_per_page'] = -1;
        unset($query['offset']);

        // Execute query and count results
        $posts = \get_posts($query);
        return count($posts);
    }
    /**
     * Limit of how many custom posts can be retrieved in the query.
     * Override this value for specific custom post types
     */
    protected function getCustomPostListMaxLimit(): int
    {
        return ComponentConfiguration::getCustomPostListMaxLimit();
    }
    /**
     * @param array<string, mixed> $query
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    protected function convertCustomPostsQuery(array $query, array $options = []): array
    {
        if ($return_type = $options[QueryOptions::RETURN_TYPE] ?? null) {
            if ($return_type == ReturnTypes::IDS) {
                $query['fields'] = 'ids';
            }
        }

        // If param "status" in $query is not passed, it defaults to "publish"
        $query = array_merge($this->getCustomPostQueryDefaults(), $query);

        // Convert the parameters
        if (isset($query['status'])) {
            if (is_array($query['status'])) {
                // doing get_posts can accept an array of values
                $query['post_status'] = array_map(
                    [CustomPostTypeAPIUtils::class, 'convertPostStatusFromPoPToCMS'],
                    $query['status']
                );
            } else {
                // doing wp_insert/update_post accepts a single value
                $query['post_status'] = CustomPostTypeAPIUtils::convertPostStatusFromPoPToCMS($query['status']);
            }
            unset($query['status']);
        }
        if (isset($query['include']) && is_array($query['include'])) {
            // It can be an array or a string
            $query['include'] = implode(',', $query['include']);
        }
        if (isset($query['exclude-ids'])) {
            $query['post__not_in'] = $query['exclude-ids'];
            unset($query['exclude-ids']);
        }
        // If querying "customPostCount(postTypes:[])" it would reset the list to only "post"
        // So check that postTypes is not empty
        if (isset($query['custompost-types']) && !empty($query['custompost-types'])) {
            $query['post_type'] = $query['custompost-types'];
            unset($query['custompost-types']);
        } elseif ($unionTypeResolverClass = $query['types-from-union-resolver-class'] ?? null) {
            $query['post_type'] = CustomPostUnionTypeHelpers::getTargetTypeResolverCustomPostTypes(
                $unionTypeResolverClass
            );
            unset($query['types-from-union-resolver-class']);
        }
        if (isset($query['offset'])) {
            // Same param name, so do nothing
        }
        if (isset($query['limit'])) {
            // Maybe restrict the limit, if higher than the max limit
            // Allow to not limit by max when querying from within the application
            $limit = (int) $query['limit'];
            if (!isset($options[QueryOptions::SKIP_MAX_LIMIT]) || !$options[QueryOptions::SKIP_MAX_LIMIT]) {
                $limit = $this->queriedObjectHelperService->getLimitOrMaxLimit(
                    $limit,
                    $this->getCustomPostListMaxLimit()
                );
            }

            // Assign the limit as the required attribute
            $query['posts_per_page'] = $limit;
            unset($query['limit']);
        }
        if (isset($query['order'])) {
            // Same param name, so do nothing
        }
        if (isset($query['orderby'])) {
            // Same param name, so do nothing
        }
        // Post slug
        if (isset($query['slug'])) {
            $query['name'] = $query['slug'];
            unset($query['slug']);
        }
        if (isset($query['post-not-in'])) {
            $query['post__not_in'] = $query['post-not-in'];
            unset($query['post-not-in']);
        }
        if (isset($query['search'])) {
            $query['is_search'] = true;
            $query['s'] = $query['search'];
            unset($query['search']);
        }
        // Filtering by date: Instead of operating on the query, it does it through filter 'posts_where'
        if (isset($query['date-from'])) {
            $query['date_query'][] = [
                'after' => $query['date-from'],
                'inclusive' => false,
            ];
            unset($query['date-from']);
        }
        if (isset($query['date-from-inclusive'])) {
            $query['date_query'][] = [
                'after' => $query['date-from-inclusive'],
                'inclusive' => true,
            ];
            unset($query['date-from-inclusive']);
        }
        if (isset($query['date-to'])) {
            $query['date_query'][] = [
                'before' => $query['date-to'],
                'inclusive' => false,
            ];
            unset($query['date-to']);
        }
        if (isset($query['date-to-inclusive'])) {
            $query['date_query'][] = [
                'before' => $query['date-to-inclusive'],
                'inclusive' => true,
            ];
            unset($query['date-to-inclusive']);
        }

        return $this->hooksAPI->applyFilters(
            self::HOOK_QUERY,
            $query,
            $options
        );
    }
    public function getCustomPostTypes(array $query = array()): array
    {
        // Convert the parameters
        if (isset($query['exclude-from-search'])) {
            $query['exclude_from_search'] = $query['exclude-from-search'];
            unset($query['exclude-from-search']);
        }
        if (isset($query['publicly-queryable'])) {
            $query['publicly_queryable'] = $query['publicly-queryable'];
            unset($query['publicly-queryable']);
        }
        return \get_post_types($query);
    }

    public function getPermalink(string | int | object $customPostObjectOrID): ?string
    {
        $customPostID = $this->getCustomPostID($customPostObjectOrID);
        if ($customPostID === null) {
            return null;
        }
        if ($this->getStatus($customPostObjectOrID) == Status::PUBLISHED) {
            return \get_permalink($customPostID);
        }

        // Function get_sample_permalink comes from the file below, so it must be included
        // Code below copied from `function get_sample_permalink_html`
        include_once ABSPATH . 'wp-admin/includes/post.php';
        list($permalink, $post_name) = \get_sample_permalink($customPostID, null, null);
        return str_replace(['%pagename%', '%postname%'], $post_name, $permalink);
    }


    public function getSlug(string | int | object $customPostObjectOrID): ?string
    {
        list(
            $customPost,
            $customPostID,
        ) = $this->getCustomPostObjectAndID($customPostObjectOrID);
        if ($customPost === null) {
            return null;
        }
        /** @var WP_Post $customPost */
        if ($this->getStatus($customPostObjectOrID) === Status::PUBLISHED) {
            return $customPost->post_name;
        }

        // Function get_sample_permalink comes from the file below, so it must be included
        // Code below copied from `function get_sample_permalink_html`
        include_once ABSPATH . 'wp-admin/includes/post.php';
        list($permalink, $post_name) = \get_sample_permalink($customPostID, null, null);
        return $post_name;
    }

    public function getExcerpt(string | int | object $customPostObjectOrID): ?string
    {
        return \get_the_excerpt($customPostObjectOrID);
    }
    /**
     * @return mixed[]
     */
    protected function getCustomPostObjectAndID(string | int | object $customPostObjectOrID): array
    {
        return CustomPostTypeAPIHelpers::getCustomPostObjectAndID($customPostObjectOrID);
    }

    protected function getCustomPostObject(string | int | object $customPostObjectOrID): ?object
    {
        list(
            $customPost,
            $customPostID,
        ) = $this->getCustomPostObjectAndID($customPostObjectOrID);
        return $customPost;
    }

    protected function getCustomPostID(string | int | object $customPostObjectOrID): ?int
    {
        list(
            $customPost,
            $customPostID,
        ) = $this->getCustomPostObjectAndID($customPostObjectOrID);
        return $customPostID;
    }

    public function getTitle(string | int | object $customPostObjectOrID): ?string
    {
        list(
            $customPost,
            $customPostID,
        ) = $this->getCustomPostObjectAndID($customPostObjectOrID);
        if ($customPost === null) {
            return null;
        }
        /** @var WP_Post $customPost */
        return $this->hooksAPI->applyFilters('the_title', $customPost->post_title, $customPostID);
    }

    public function getContent(string | int | object $customPostObjectOrID): ?string
    {
        $customPost = $this->getCustomPostObject($customPostObjectOrID);
        if ($customPost === null) {
            return null;
        }
        return $this->hooksAPI->applyFilters('the_content', $customPost->post_content);
    }

    public function getPlainTextContent(string | int | object $customPostObjectOrID): ?string
    {
        $customPost = $this->getCustomPostObject($customPostObjectOrID);
        if ($customPost === null) {
            return null;
        }

        // Basic content: remove embeds, shortcodes, and tags
        // Remove the embed functionality, and then add again
        $wp_embed = $GLOBALS['wp_embed'];
        $this->hooksAPI->removeFilter('the_content', array( $wp_embed, 'autoembed' ), 8);

        // Do not allow HTML tags or shortcodes
        $ret = \strip_shortcodes($customPost->post_content);
        $ret = $this->hooksAPI->applyFilters('the_content', $ret);
        $this->hooksAPI->addFilter('the_content', array( $wp_embed, 'autoembed' ), 8);

        return strip_tags($ret);
    }

    public function getPublishedDate(string | int | object $customPostObjectOrID, bool $gmt = false): ?string
    {
        $customPost = $this->getCustomPostObject($customPostObjectOrID);
        if ($customPost === null) {
            return null;
        }
        return $gmt ? $customPost->post_date_gmt : $customPost->post_date;
    }

    public function getModifiedDate(string | int | object $customPostObjectOrID, bool $gmt = false): ?string
    {
        $customPost = $this->getCustomPostObject($customPostObjectOrID);
        if ($customPost === null) {
            return null;
        }
        return $gmt ? $customPost->post_modified_gmt : $customPost->post_modified;
    }
    public function getCustomPostType(string | int | object $customPostObjectOrID): string
    {
        $customPost = $this->getCustomPostObject($customPostObjectOrID);
        return $customPost?->post_type;
    }

    /**
     * Get the post with provided ID or, if it doesn't exist, null
     */
    public function getCustomPost(int | string $id): ?object
    {
        return \get_post($id);
    }
}