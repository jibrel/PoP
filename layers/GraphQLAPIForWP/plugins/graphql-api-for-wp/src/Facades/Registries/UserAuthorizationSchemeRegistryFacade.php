<?php

declare(strict_types=1);

namespace GraphQLAPI\GraphQLAPI\Facades\Registries;

use PoP\Engine\App;
use GraphQLAPI\GraphQLAPI\Registries\UserAuthorizationSchemeRegistryInterface;

class UserAuthorizationSchemeRegistryFacade
{
    public static function getInstance(): UserAuthorizationSchemeRegistryInterface
    {
        /**
         * @var UserAuthorizationSchemeRegistryInterface
         */
        $service = App::getContainerBuilderFactory()->getInstance()->get(UserAuthorizationSchemeRegistryInterface::class);
        return $service;
    }
}
