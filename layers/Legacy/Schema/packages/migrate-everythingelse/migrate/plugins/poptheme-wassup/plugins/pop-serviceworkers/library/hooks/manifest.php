<?php

class PoPTheme_Wassup_ServiceWorkers_Hooks_Manifest
{
    public function __construct()
    {
        \PoP\Root\App::addFilter(
            'PoP_ServiceWorkersManager:manifest:icons',
            $this->icons(...)
        );
        \PoP\Root\App::addFilter(
            'PoP_ServiceWorkersManager:manifest:theme_color',
            $this->color(...)
        );
        \PoP\Root\App::addFilter(
            'PoP_ServiceWorkersManager:manifest:background_color',
            $this->color(...)
        );
    }

    public function color($color)
    {
        if ($appcolor = \PoP\Root\App::applyFilters('PoPTheme_Wassup_ServiceWorkers_Hooks_Manifest:color', '')) {
            return $appcolor;
        }
        
        return $color;
    }

    public function icons($icons)
    {
        $sizes = array(
            '48x48',
            '96x96',
            '192x192',
            '256x256',
            '512x512',
        );

        $imagename = \PoP\Root\App::applyFilters('PoPTheme_Wassup_ServiceWorkers_Hooks_Manifest:imagename', 'launcher-icon-');
        $htmlcssplatformapi = \PoP\EngineHTMLCSSPlatform\FunctionAPIFactory::getInstance();
        $path = $htmlcssplatformapi->getAssetsDirectoryURI().'/';

        foreach ($sizes as $size) {
            $icons[] = array(
                'src' => $path.$imagename.$size.'.png',
                'sizes' => $size,
                'type' => 'image/png',
            );
        }
        
        return $icons;
    }
}
    
/**
 * Initialize
 */
new PoPTheme_Wassup_ServiceWorkers_Hooks_Manifest();
