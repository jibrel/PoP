<?php

declare(strict_types=1);

namespace PoPCMSSchema\UserRolesAccessControl;

use PoP\CacheControl\Component as CacheControlComponent;
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
            \PoPCMSSchema\UserRoles\Component::class,
            \PoPCMSSchema\UserStateAccessControl\Component::class,
        ];
    }

    /**
     * All conditional component classes that this component depends upon, to initialize them
     */
    public function getDependedConditionalComponentClasses(): array
    {
        return [
            \PoP\CacheControl\Component::class,
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
        $this->initSchemaServices(dirname(__DIR__), $skipSchema);

        if (class_exists(CacheControlComponent::class)) {
            $this->initSchemaServices(
                dirname(__DIR__),
                $skipSchema || in_array(\PoP\CacheControl\Component::class, $skipSchemaComponentClasses),
                '/ConditionalOnComponent/CacheControl'
            );
        }
    }
}
