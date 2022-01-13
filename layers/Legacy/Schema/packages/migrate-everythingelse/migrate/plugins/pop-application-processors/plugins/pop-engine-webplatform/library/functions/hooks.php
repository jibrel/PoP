<?php
use PoP\Root\Facades\Hooks\HooksAPIFacade;

\PoP\Root\App::getHookManager()->addFilter('PoP_ApplicationProcessors_Utils:initializedomain:modules', 'addDomainstylesModule');
function addDomainstylesModule($modules)
{
    $modules[] = [PoP_Module_Processor_DomainStyleCodes::class, PoP_Module_Processor_DomainStyleCodes::MODULE_CODE_DOMAINSTYLES];
    return $modules;
}
