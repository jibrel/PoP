<?php

class PoPTheme_Wassup_CommonPages_ResourceLoaderProcessor_Hooks
{
    public function __construct()
    {
        \PoP\Root\App::addFilter(
            'PoP_WebPlatformQueryDataModuleProcessorBase:module-resources',
            $this->getModuleCssResources(...),
            10,
            6
        );
    }

    public function getModuleCssResources($resources, array $module, array $templateResource, $template, array $props, $processor)
    {
        switch ($module[1]) {
            case GD_ClusterCommonPages_Module_Processor_CustomScrolls::MODULE_SCROLL_OURSPONSORS_SMALLDETAILS:
                $resources[] = [PoPTheme_Wassup_CommonPages_CSSResourceLoaderProcessor::class, PoPTheme_Wassup_CommonPages_CSSResourceLoaderProcessor::RESOURCE_CSS_SMALLDETAILS];
                break;
        }

        return $resources;
    }
}

/**
 * Initialization
 */
new PoPTheme_Wassup_CommonPages_ResourceLoaderProcessor_Hooks();
