<?php

declare(strict_types=1);

namespace PoPCMSSchema\MetaQueryWP;

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
            \PoPSchema\SchemaCommons\Component::class,
        ];
    }
}
