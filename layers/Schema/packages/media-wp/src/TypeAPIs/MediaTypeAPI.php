<?php

declare(strict_types=1);

namespace PoPSchema\MediaWP\TypeAPIs;

use function get_posts;
use function wp_get_attachment_image_src;

use PoP\ComponentModel\TypeAPIs\InjectedFilterDataloadingModuleTypeAPITrait;
use PoP\Hooks\HooksAPIInterface;
use PoPSchema\Media\ComponentConfiguration;
use PoPSchema\Media\TypeAPIs\MediaTypeAPIInterface;
use PoPSchema\QueriedObject\Helpers\QueriedObjectHelperServiceInterface;
use PoPSchema\SchemaCommons\DataLoading\ReturnTypes;
use WP_Post;

/**
 * Methods to interact with the Type, to be implemented by the underlying CMS
 */
class MediaTypeAPI implements MediaTypeAPIInterface
{
    use InjectedFilterDataloadingModuleTypeAPITrait;

    public const HOOK_QUERY = __CLASS__ . ':query';

    public function __construct(
        protected HooksAPIInterface $hooksAPI,
        protected QueriedObjectHelperServiceInterface $queriedObjectHelperService,
    ) {
    }
    /**
     * Indicates if the passed object is of type Media
     */
    public function isInstanceOfMediaType(object $object): bool
    {
        return ($object instanceof WP_Post) && $object->post_type == 'attachment';
    }

    public function getMediaItemSrc(string | int $media_id): ?string
    {
        return wp_get_attachment_url($media_id);
    }

    public function getImageSrc(string | int $image_id, ?string $size = null): ?string
    {
        $img = $this->getImageProperties($image_id, $size);
        if ($img === null) {
            return null;
        }
        return $img['src'];
    }

    public function getImageSrcSet(string | int $image_id, ?string $size = null): ?string
    {
        $srcSet = wp_get_attachment_image_srcset($image_id, $size);
        if ($srcSet === false) {
            return null;
        }
        return $srcSet;
    }

    public function getImageProperties(string | int $image_id, ?string $size = null): ?array
    {
        $img = wp_get_attachment_image_src($image_id, $size);
        if ($img === false) {
            return null;
        }
        return [
            'src' => $img[0],
            'width' => $img[1],
            'height' => $img[2]
        ];
    }

    public function getMediaElements(array $query, array $options = []): array
    {
        // Accept field atts to filter the API fields
        $this->maybeFilterDataloadQueryArgs($query, $options);

        // Convert the parameters
        $query = $this->convertMediaQuery($query, $options);
        return get_posts($query);
    }
    protected function convertMediaQuery($query, array $options = [])
    {
        if ($return_type = $options['return-type'] ?? null) {
            if ($return_type == ReturnTypes::IDS) {
                $query['fields'] = 'ids';
            }
        }

        if (isset($query['include'])) {
            // Transform from array to string
            $query['include'] = implode(',', $query['include']);
        }
        $query['post_type'] = 'attachment';
        if (isset($query['mime-types'])) {
            // Transform from array to string
            $query['post_mime_type'] = implode(',', $query['mime-types']);
            unset($query['mime-types']);
        }
        if (isset($query['offset'])) {
            // Same param name, so do nothing
        }
        if (isset($query['limit'])) {
            // Maybe restrict the limit, if higher than the max limit
            // Allow to not limit by max when querying from within the application
            $limit = (int) $query['limit'];
            if (!isset($options['skip-max-limit']) || !$options['skip-max-limit']) {
                $limit = $this->queriedObjectHelperService->getLimitOrMaxLimit(
                    $limit,
                    ComponentConfiguration::getMediaListMaxLimit()
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
            // This param can either be a string or an array. Eg:
            // $query['orderby'] => array('date' => 'DESC', 'title' => 'ASC');
        }
        // Post slug
        if (isset($query['slug'])) {
            $query['name'] = $query['slug'];
            unset($query['slug']);
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

    public function getMediaElementId(object $media): string | int
    {
        return $media->ID;
    }
}
