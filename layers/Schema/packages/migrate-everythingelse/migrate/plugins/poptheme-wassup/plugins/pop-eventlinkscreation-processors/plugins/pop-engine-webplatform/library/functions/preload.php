<?php
use PoP\Hooks\Facades\HooksAPIFacade;

class PoPTheme_Wassup_EventLinksCreation_WebPlatform_PreloadHooks
{
    public function __construct()
    {
        HooksAPIFacade::getInstance()->addFilter(
            'wassup:extra-routes:initialframes:'.POP_TARGET_MAIN,
            array($this, 'maybeGetRoutesForMain')
        );
        HooksAPIFacade::getInstance()->addFilter(
            'wassup:extra-routes:initialframes:'.POP_TARGET_ADDONS,
            array($this, 'maybeGetRoutesForAddons')
        );
    }

    public function maybeGetRoutesForMain($routes)
    {
        if (PoP_Application_Utils::getAddcontentTarget() == POP_TARGET_MAIN) {
            $routes[] = POP_EVENTLINKSCREATION_ROUTE_ADDEVENTLINK;
        }
        return $routes;
    }

    public function maybeGetRoutesForAddons($routes)
    {
        if (PoP_Application_Utils::getAddcontentTarget() == POP_TARGET_ADDONS) {
            $routes[] = POP_EVENTLINKSCREATION_ROUTE_ADDEVENTLINK;
        }
        return $routes;
    }
}

/**
 * Initialization
 */
new PoPTheme_Wassup_EventLinksCreation_WebPlatform_PreloadHooks();
