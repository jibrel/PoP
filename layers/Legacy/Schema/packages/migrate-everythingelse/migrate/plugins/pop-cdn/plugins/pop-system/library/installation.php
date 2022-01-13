<?php
use PoP\FileStore\Facades\FileRendererFacade;
use PoP\Root\Facades\Hooks\HooksAPIFacade;

class PoP_CDN_Installation
{
    public function __construct()
    {
        \PoP\Root\App::getHookManager()->addAction('PoP:system-generate', array($this, 'systemGenerate'));
    }

    public function systemGenerate()
    {
        global $pop_cdn_configfile;
        // $pop_cdn_configfile->generate();
        FileRendererFacade::getInstance()->renderAndSave($pop_cdn_configfile);
    }
}

/**
 * Initialization
 */
new PoP_CDN_Installation();
