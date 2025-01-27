<?php

declare(strict_types=1);

namespace PoPCMSSchema\SchemaCommons;

use PoP\Root\Component\AbstractComponentConfiguration;
use PoP\Root\Component\EnvironmentValueHelpers;

class ComponentConfiguration extends AbstractComponentConfiguration
{
    /**
     * Remove unwanted data added to the REQUEST_URI, replacing
     * it with the website home URL.
     *
     * Eg: the language information from qTranslate (https://domain.com/en/...)
     */
    public function overrideRequestURI(): bool
    {
        $envVariable = Environment::OVERRIDE_REQUEST_URI;
        $defaultValue = false;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }
}
