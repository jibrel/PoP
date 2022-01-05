<?php

declare(strict_types=1);

namespace PoP\Engine\Facades\CMS;

use PoP\Engine\App;
use PoP\Engine\CMS\CMSServiceInterface;

class CMSServiceFacade
{
    public static function getInstance(): CMSServiceInterface
    {
        /**
         * @var CMSServiceInterface
         */
        $service = App::getContainerBuilderFactory()->getInstance()->get(CMSServiceInterface::class);
        return $service;
    }
}
