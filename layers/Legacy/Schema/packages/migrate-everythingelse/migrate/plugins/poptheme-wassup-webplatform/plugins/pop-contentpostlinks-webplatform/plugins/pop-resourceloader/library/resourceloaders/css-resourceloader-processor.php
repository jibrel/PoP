<?php

class PopThemeWassup_CPL_CSSResourceLoaderProcessor extends PoP_CSSResourceLoaderProcessor
{
    public final const RESOURCE_CSS_CONTENTPOSTLINKSSTYLES = 'css-contentpostlinks-styles';

    public function getResourcesToProcess()
    {
        return [
            [self::class, self::RESOURCE_CSS_CONTENTPOSTLINKSSTYLES],
        ];
    }
    
    public function getFilename(array $resource)
    {
        $filenames = array(
            self::RESOURCE_CSS_CONTENTPOSTLINKSSTYLES => 'styles',
        );
        if ($filename = $filenames[$resource[1]]) {
            return $filename;
        }

        return parent::getFilename($resource);
    }
    
    public function getVersion(array $resource)
    {
        return POPTHEME_WASSUPWEBPLATFORM_VERSION;
    }
    
    public function getDir(array $resource)
    {
        $subpath = PoP_WebPlatform_ServerUtils::useMinifiedResources() ? 'dist/' : '';
        return POPTHEME_WASSUPWEBPLATFORM_DIR.'/css/'.$subpath.'libraries/plugins/pop-contentpostlinks';
    }
    
    public function getPath(array $resource)
    {
        $subpath = PoP_WebPlatform_ServerUtils::useMinifiedResources() ? 'dist/' : '';
        return POPTHEME_WASSUPWEBPLATFORM_URL.'/css/'.$subpath.'libraries/plugins/pop-contentpostlinks';
    }
}


