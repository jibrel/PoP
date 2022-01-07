<?php

declare(strict_types=1);

namespace GraphQLByPoP\GraphQLRequest;

use PoP\Root\App;
use GraphQLByPoP\GraphQLQuery\Component as GraphQLQueryComponent;
use PoP\BasicService\Component\AbstractComponent;

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
            \GraphQLByPoP\GraphQLQuery\Component::class,
        ];
    }

    public function isEnabled(): bool
    {
        return App::getComponent(GraphQLQueryComponent::class)->isEnabled();
    }

    /**
     * Initialize services
     *
     * @param string[] $skipSchemaComponentClasses
     */
    protected function initializeContainerServices(
        bool $skipSchema = false,
        array $skipSchemaComponentClasses = []
    ): void {
        $this->initServices(dirname(__DIR__));
    }
}
