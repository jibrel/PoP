<?php

declare(strict_types=1);

namespace PoP\API\Facades;

use PoP\Engine\App;
use PoP\API\PersistedQueries\PersistedFragmentManagerInterface;

class PersistedFragmentManagerFacade
{
    public static function getInstance(): PersistedFragmentManagerInterface
    {
        /**
         * @var PersistedFragmentManagerInterface
         */
        $service = App::getContainerBuilderFactory()->getInstance()->get(PersistedFragmentManagerInterface::class);
        return $service;
    }
}
