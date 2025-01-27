<?php

declare(strict_types=1);

namespace PoPSchema\EverythingElseWP;

use PoP\Root\Component\AbstractComponent;
use PoPCMSSchema\CustomPosts\Component as CustomPostsComponent;

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
            \PoPSchema\EverythingElse\Component::class,
            \PoP\EngineWP\Component::class,
        ];
    }

    /**
     * All conditional component classes that this component depends upon, to initialize them
     */
    public function getDependedConditionalComponentClasses(): array
    {
        return [
            \PoPCMSSchema\CustomPosts\Component::class,
        ];
    }

    /**
     * Initialize services
     *
     * @param array<string, mixed> $configuration
     * @param string[] $skipSchemaComponentClasses
     */
    protected function initializeContainerServices(
        bool $skipSchema,
        array $skipSchemaComponentClasses,
    ): void {
        if (class_exists(CustomPostsComponent::class)) {
            $this->initServices(dirname(__DIR__), '/ConditionalOnComponent/CustomPosts');
        }
    }
}
