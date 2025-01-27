<?php

class PoP_UserStance_CSSConverter_Hooks
{
    public function __construct()
    {
        \PoP\Root\App::addFilter(
            'PoP_CSSConverter_ConversionManager:css-files',
            $this->addCssFiles(...)
        );
    }

    public function addCssFiles($files)
    {
        $files[] = POP_USERSTANCEWEBPLATFORM_DIR.'/css/dist/bundles/pop-userstance.bundle.min.css';
        return $files;
    }
}


/**
 * Initialization
 */
new PoP_UserStance_CSSConverter_Hooks();
