<?php

declare(strict_types=1);

namespace PoPCMSSchema\PostCategoryMutationsWP;

use PoP\Root\Component\AbstractComponent;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    /**
     * Classes from PoP components that must be initialized before this component
     *
     * @return string[]
     */
    public function getDependedComponentClasses(): array
    {
        return [
            \PoPCMSSchema\PostCategoryMutations\Component::class,
            \PoPCMSSchema\CustomPostMutationsWP\Component::class,
            \PoPCMSSchema\PostCategoriesWP\Component::class,
            \PoPCMSSchema\UserStateWP\Component::class,
        ];
    }

    /**
     * Initialize services
     *
     * @param string[] $skipSchemaComponentClasses
     */
    protected function initializeContainerServices(
        bool $skipSchema,
        array $skipSchemaComponentClasses,
    ): void {
        $this->initServices(dirname(__DIR__));
    }
}