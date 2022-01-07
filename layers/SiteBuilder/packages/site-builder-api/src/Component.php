<?php

declare(strict_types=1);

namespace PoP\SiteBuilderAPI;

use PoP\API\Environment;
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
            \PoP\API\Component::class,
        ];
    }

    public function isEnabled(): bool
    {
        return !Environment::disableAPI();
    }
}
