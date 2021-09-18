<?php

declare(strict_types=1);

namespace PoPSchema\CustomPostsWP\Overrides\RelationalTypeDataLoaders\UnionType;

use PoP\ComponentModel\Instances\InstanceManagerInterface;
use PoP\Hooks\HooksAPIInterface;
use PoP\LooseContracts\NameResolverInterface;
use PoPSchema\CustomPosts\Facades\CustomPostTypeAPIFacade;
use PoPSchema\CustomPosts\RelationalTypeDataLoaders\ObjectType\CustomPostTypeDataLoader;
use PoPSchema\CustomPosts\TypeHelpers\CustomPostUnionTypeHelpers;
use PoPSchema\CustomPosts\TypeResolvers\UnionType\CustomPostUnionTypeResolver;
use PoPSchema\CustomPostsWP\ObjectTypeResolverPickers\CustomPostTypeResolverPickerInterface;
use PoPSchema\CustomPosts\RelationalTypeDataLoaders\UnionType\CustomPostUnionTypeDataLoader as UpstreamCustomPostUnionTypeDataLoader;

/**
 * In the context of WordPress, "Custom Posts" are all posts (eg: posts, pages, attachments, events, etc)
 * Hence, this class can simply inherit from the Post dataloader, and add the post-types for all required types
 */
class CustomPostUnionTypeDataLoader extends UpstreamCustomPostUnionTypeDataLoader
{
    public function __construct(
        HooksAPIInterface $hooksAPI,
        InstanceManagerInterface $instanceManager,
        NameResolverInterface $nameResolver,
        CustomPostUnionTypeResolver $customPostUnionTypeResolver,
        protected CustomPostTypeDataLoader $customPostTypeDataLoader,
    ) {
        parent::__construct(
            $hooksAPI,
            $instanceManager,
            $nameResolver,
            $customPostUnionTypeResolver,
        );
    }

    public function getQueryToRetrieveObjectsForIDs(array $ids): array
    {
        $query = $this->customPostTypeDataLoader->getQueryToRetrieveObjectsForIDs($ids);

        // From all post types from the member typeResolvers
        $query['custompost-types'] = CustomPostUnionTypeHelpers::getTargetObjectTypeResolverCustomPostTypes(CustomPostUnionTypeResolver::class);

        return $query;
    }

    public function getObjects(array $ids): array
    {
        $customPosts = $this->customPostTypeDataLoader->getObjects($ids);

        // After executing `get_posts` it returns a list of custom posts of class WP_Post,
        // without converting the object to its own post type (eg: EM_Event for an "event" custom post type)
        // Cast the custom posts to their own classes
        $customPostTypeAPI = CustomPostTypeAPIFacade::getInstance();
        // Group all the customPosts by targetResolverPicker,
        // so that their casting can be executed in a single query per type
        $customPostTypeTypeResolverPickers = [];
        $customPostTypeItemCustomPosts = [];
        foreach ($customPosts as $customPost) {
            $targetTypeResolverPicker = $this->customPostUnionTypeResolver->getTargetObjectTypeResolverPicker($customPost);
            if (
                // If `null`, no picker handles this type, then do nothing
                is_null($targetTypeResolverPicker)
                // Needs be an instance of this interface, or do nothing
                || !($targetTypeResolverPicker instanceof CustomPostTypeResolverPickerInterface)
            ) {
                continue;
            }
            // Add the Custom Post Type as the key, which can uniquely identify the picker
            $customPostType = $targetTypeResolverPicker->getCustomPostType();
            $customPostID = $customPostTypeAPI->getID($customPost);
            $customPostTypeTypeResolverPickers[$customPostType] = $targetTypeResolverPicker;
            $customPostTypeItemCustomPosts[$customPostType][$customPostID] = $customPost;
        }
        // Cast all objects from the same type in a single query
        $castedCustomPosts = [];
        foreach ($customPostTypeItemCustomPosts as $customPostType => $customPostIDObjects) {
            $customPostTypeTypeResolverPicker = $customPostTypeTypeResolverPickers[$customPostType];
            $castedCustomPosts[$customPostType] = $customPostTypeTypeResolverPicker->maybeCastCustomPosts($customPostIDObjects);
        }

        // Replace each custom post with its casted object
        $customPosts = array_map(
            function (
                $customPost
            ) use (
                $customPostTypeAPI,
                $castedCustomPosts
            ) {
                $targetTypeResolverPicker = $this->customPostUnionTypeResolver->getTargetObjectTypeResolverPicker($customPost);
                if (
                    is_null($targetTypeResolverPicker)
                    || !($targetTypeResolverPicker instanceof CustomPostTypeResolverPickerInterface)
                ) {
                    return $customPost;
                }
                $customPostType = $targetTypeResolverPicker->getCustomPostType();
                $customPostID = $customPostTypeAPI->getID($customPost);
                return $castedCustomPosts[$customPostType][$customPostID];
            },
            $customPosts
        );
        return $customPosts;
    }
}
