<?php

declare(strict_types=1);

namespace PoPCMSSchema\Pages;

use PoP\Root\Component\AbstractComponentConfiguration;
use PoP\Root\Component\EnvironmentValueHelpers;

class ComponentConfiguration extends AbstractComponentConfiguration
{
    public function getPageListDefaultLimit(): ?int
    {
        $envVariable = Environment::PAGE_LIST_DEFAULT_LIMIT;
        $defaultValue = 10;
        $callback = EnvironmentValueHelpers::toInt(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function getPageListMaxLimit(): ?int
    {
        $envVariable = Environment::PAGE_LIST_MAX_LIMIT;
        $defaultValue = -1; // Unlimited
        $callback = EnvironmentValueHelpers::toInt(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function addPageTypeToCustomPostUnionTypes(): bool
    {
        $envVariable = Environment::ADD_PAGE_TYPE_TO_CUSTOMPOST_UNION_TYPES;
        $defaultValue = false;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }
}
