<?php

declare(strict_types=1);

namespace PoPCMSSchema\CommentMutations;

use PoP\Root\Component\AbstractComponent;
use PoPCMSSchema\Users\Component as UsersComponent;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    protected function requiresSatisfyingComponent(): bool
    {
        return true;
    }

    /**
     * Classes from PoP components that must be initialized before this component
     *
     * @return string[]
     */
    public function getDependedComponentClasses(): array
    {
        return [
            \PoPCMSSchema\Comments\Component::class,
            \PoPCMSSchema\UserStateMutations\Component::class,
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
        $this->initSchemaServices(
            dirname(__DIR__),
            $skipSchema || in_array(UsersComponent::class, $skipSchemaComponentClasses),
            '/ConditionalOnComponent/Users'
        );
    }
}
