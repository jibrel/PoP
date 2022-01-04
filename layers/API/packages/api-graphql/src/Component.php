<?php

declare(strict_types=1);

namespace PoP\GraphQLAPI;

use PoP\Root\Managers\ComponentManager;
use PoP\API\Component as APIComponent;
use PoP\BasicService\Component\AbstractComponent;
use PoP\Root\Component\CanDisableComponentTrait;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    use CanDisableComponentTrait;

    /**
     * Classes from PoP components that must be initialized before this component
     *
     * @return string[]
     */
    public function getDependedComponentClasses(): array
    {
        return [
            \PoP\APIMirrorQuery\Component::class,
        ];
    }

    /**
     * Initialize services
     *
     * @param array<string, mixed> $configuration
     * @param string[] $skipSchemaComponentClasses
     */
    protected function initializeContainerServices(
        array $configuration = [],
        bool $skipSchema = false,
        array $skipSchemaComponentClasses = []
    ): void {
        if ($this->isEnabled()) {
            $this->initServices(dirname(__DIR__));
        }
    }

    protected function resolveEnabled(): bool
    {
        return ComponentManager::getComponent(APIComponent::class)->isEnabled() && !Environment::disableGraphQLAPI();
    }
}
