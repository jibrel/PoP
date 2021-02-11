<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return function (ContainerConfigurator $configurator) {
    $services = $configurator->services()
        ->defaults()
            ->public()
            ->autowire();
    $services->load(
        'Leoloso\\ExamplesForPoP\\ConditionalOnEnvironment\\UseComponentModelCache\\SchemaServices\\',
        '../../../src/ConditionalOnEnvironment/UseComponentModelCache/SchemaServices/*'
    );
};
