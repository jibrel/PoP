<?php

declare(strict_types=1);

namespace PoPCMSSchema\GenericCustomPosts\RelationalTypeDataLoaders\ObjectType;

use PoP\Root\App;
use PoPCMSSchema\CustomPosts\RelationalTypeDataLoaders\ObjectType\AbstractCustomPostTypeDataLoader;
use PoPCMSSchema\GenericCustomPosts\Component;
use PoPCMSSchema\GenericCustomPosts\ComponentConfiguration;

class GenericCustomPostTypeDataLoader extends AbstractCustomPostTypeDataLoader
{
    /**
     * Override the custompost-types from the parent
     */
    public function getQueryToRetrieveObjectsForIDs(array $ids): array
    {
        /** @var ComponentConfiguration */
        $componentConfiguration = App::getComponent(Component::class)->getConfiguration();
        return array_merge(
            parent::getQueryToRetrieveObjectsForIDs($ids),
            [
                'custompost-types' => $componentConfiguration->getGenericCustomPostTypes(),
            ]
        );
    }
}
