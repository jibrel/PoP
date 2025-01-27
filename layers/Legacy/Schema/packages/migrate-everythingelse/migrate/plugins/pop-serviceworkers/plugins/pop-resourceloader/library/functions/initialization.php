<?php
use PoP\ComponentModel\Misc\RequestUtils;

class PoP_ServiceWorkers_WebPlatform_ResourceLoader_Initialization
{
    public function __construct()
    {

        // Unhook the default function, instead hook the one here, which registers not just the current resources,
        // but all of them! This way, all resources will make it to the precache list and be cached in SW
        global $popwebplatform_resourceloader_initialization;
        \PoP\Root\App::removeAction('popcms:enqueueScripts', array($popwebplatform_resourceloader_initialization, 'registerScripts'));
        \PoP\Root\App::addAction('popcms:enqueueScripts', $this->registerScripts(...));
        \PoP\Root\App::removeAction('popcms:printStyles', array($popwebplatform_resourceloader_initialization, 'registerStyles'));
        \PoP\Root\App::addAction('popcms:printStyles', $this->registerStyles(...));

        // When generating the Service Workers, we need to register all of the CSS files to output them in the precache list
        \PoP\Root\App::addFilter('getResourcesIncludeType', $this->getResourcesIncludeType(...));

        // Always use the SW creation in 'resource' mode, to avoid $bundle(group)s being enqueued instead of $resources
        \PoP\Root\App::addFilter('getEnqueuefileType', $this->getEnqueuefileType(...));
    }

    public function getResourcesIncludeType($type)
    {

        // When generating the Service Workers, we need to register all of the CSS files to output them in the precache list.
        // By using 'header', the styles will be registered through WP standard function, from where we fetch the resources
        return 'header';
    }

    public function getEnqueuefileType($type)
    {

        // Always use the SW creation in 'resource' mode, to avoid $bundle(group)s being enqueued instead of $resources
        return 'resource';
    }

    public function registerScripts()
    {

        // Register the scripts from the Resource Loader on the current request
        // Only if loading the frame, and it is configured to use code splitting
        $cmsapplicationapi = \PoP\Application\FunctionAPIFactory::getInstance();
        if (!$cmsapplicationapi->isAdminPanel() && RequestUtils::loadingSite() && PoP_ResourceLoader_ServerUtils::useCodeSplitting()) {
            global $pop_serviceworkers_webplatform_resourceloader_scriptsandstyles_registration;
            $pop_serviceworkers_webplatform_resourceloader_scriptsandstyles_registration->registerScripts();
        }
    }

    public function registerStyles()
    {

        // Register the scripts from the Resource Loader on the current request
        // Only if loading the frame, and it is configured to use code splitting
        $cmsapplicationapi = \PoP\Application\FunctionAPIFactory::getInstance();
        if (!$cmsapplicationapi->isAdminPanel() && RequestUtils::loadingSite() && PoP_ResourceLoader_ServerUtils::useCodeSplitting()) {
            global $pop_serviceworkers_webplatform_resourceloader_scriptsandstyles_registration;
            $pop_serviceworkers_webplatform_resourceloader_scriptsandstyles_registration->registerStyles();
        }
    }
}

/**
 * Initialization
 */
// It is initialized inside function systemGenerate()
// new PoP_ServiceWorkers_WebPlatform_ResourceLoader_Initialization();
