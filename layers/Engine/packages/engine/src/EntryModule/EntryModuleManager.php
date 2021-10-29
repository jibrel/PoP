<?php

declare(strict_types=1);

namespace PoP\Engine\EntryModule;

use PoP\ComponentModel\EntryModule\EntryModuleManagerInterface;
use PoP\ComponentModel\Services\BasicServiceTrait;
use PoP\ModuleRouting\ModuleRoutingGroups;
use PoP\ModuleRouting\RouteModuleProcessorManagerInterface;
use Symfony\Contracts\Service\Attribute\Required;

class EntryModuleManager implements EntryModuleManagerInterface
{
    use BasicServiceTrait;

    private ?RouteModuleProcessorManagerInterface $routeModuleProcessorManager = null;

    public function setRouteModuleProcessorManager(RouteModuleProcessorManagerInterface $routeModuleProcessorManager): void
    {
        $this->routeModuleProcessorManager = $routeModuleProcessorManager;
    }
    protected function getRouteModuleProcessorManager(): RouteModuleProcessorManagerInterface
    {
        return $this->routeModuleProcessorManager ??= $this->instanceManager->getInstance(RouteModuleProcessorManagerInterface::class);
    }

    public function getEntryModule(): ?array
    {
        return $this->getRouteModuleProcessorManager()->getRouteModuleByMostAllmatchingVarsProperties(ModuleRoutingGroups::ENTRYMODULE);
    }
}
