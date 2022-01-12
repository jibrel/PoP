<?php

declare(strict_types=1);

namespace PoP\ConfigurationComponentModel\Hooks;

use PoP\ConfigurationComponentModel\Constants\Params;
use PoP\BasicService\AbstractHookSet;

class URLHookSet extends AbstractHookSet
{
    protected function init(): void
    {
        $this->getHooksAPI()->addFilter(
            'RequestUtils:current_url:remove_params',
            [$this, 'getParamsToRemoveFromURL']
        );
    }
    public function getParamsToRemoveFromURL($params)
    {
        $params[] = Params::STRATUM;
        $params[] = Params::SETTINGSFORMAT;
        $params[] = Params::TARGET;
        return $params;
    }
}