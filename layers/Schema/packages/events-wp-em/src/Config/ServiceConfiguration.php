<?php

declare(strict_types=1);

namespace PoPSchema\EventsWPEM\Config;

use PoP\Root\Component\PHPServiceConfigurationTrait;
use PoP\ComponentModel\Container\ContainerBuilderUtils;
use PoP\ComponentModel\Instances\InstanceManagerInterface;

class ServiceConfiguration
{
    use PHPServiceConfigurationTrait;

    protected static function configure(): void
    {
        ContainerBuilderUtils::injectValuesIntoService(
            InstanceManagerInterface::class,
            'overrideClass',
            \PoPSchema\Events\TypeResolverPickers\Optional\EventCustomPostTypeResolverPicker::class,
            \PoPSchema\EventsWPEM\TypeResolverPickers\Overrides\EventCustomPostTypeResolverPicker::class
        );
    }
}
