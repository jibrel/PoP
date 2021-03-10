<?php

declare(strict_types=1);

namespace GraphQLAPI\GraphQLAPI\Services\Blocks;

use GraphQLAPI\GraphQLAPI\HybridServices\ModuleResolvers\PerformanceFunctionalityModuleResolver;
use GraphQLAPI\GraphQLAPI\Services\PostTypes\GraphQLCacheControlListPostType;

/**
 * Cache Control block
 */
class SchemaConfigCacheControlListBlock extends AbstractSchemaConfigPostListBlock
{
    public const ATTRIBUTE_NAME_CACHE_CONTROL_LISTS = 'cacheControlLists';

    protected function getBlockName(): string
    {
        return 'schema-config-cache-control-lists';
    }

    public function getEnablingModule(): ?string
    {
        return PerformanceFunctionalityModuleResolver::CACHE_CONTROL;
    }

    protected function getAttributeName(): string
    {
        return self::ATTRIBUTE_NAME_CACHE_CONTROL_LISTS;
    }

    protected function getPostType(): string
    {
        return GraphQLCacheControlListPostType::POST_TYPE;
    }

    protected function getHeader(): string
    {
        return \__('Cache Control Lists:');
    }
}