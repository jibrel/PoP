<?php

class PoP_AAL_Processors_ResourceLoaderProcessor extends PoP_JSResourceLoaderProcessor
{
    public final const RESOURCE_NOTIFICATIONS = 'notifications';

    public function getResourcesToProcess()
    {
        return [
            [self::class, self::RESOURCE_NOTIFICATIONS],
        ];
    }
    
    public function getFilename(array $resource)
    {
        $filenames = array(
            self::RESOURCE_NOTIFICATIONS => 'notifications',
        );
        if ($filename = $filenames[$resource[1]]) {
            return $filename;
        }

        return parent::getFilename($resource);
    }
    
    public function getVersion(array $resource)
    {
        return POP_NOTIFICATIONSWEBPLATFORM_VERSION;
    }
    
    public function getDir(array $resource)
    {
        $subpath = PoP_WebPlatform_ServerUtils::useMinifiedResources() ? 'dist/' : '';
        return POP_NOTIFICATIONSWEBPLATFORM_DIR.'/js/'.$subpath.'libraries';
    }
    
    public function getAssetPath(array $resource)
    {
        return POP_NOTIFICATIONSWEBPLATFORM_DIR.'/js/libraries/'.$this->getFilename($resource).'.js';
    }
    
    public function getPath(array $resource)
    {
        $subpath = PoP_WebPlatform_ServerUtils::useMinifiedResources() ? 'dist/' : '';
        return POP_NOTIFICATIONSWEBPLATFORM_URL.'/js/'.$subpath.'libraries';
    }

    public function getJsobjects(array $resource)
    {
        $objects = array(
            self::RESOURCE_NOTIFICATIONS => array(
                'Notifications',
            ),
        );
        if ($object = $objects[$resource[1]]) {
            return $object;
        }

        return parent::getJsobjects($resource);
    }
    
    public function getDependencies(array $resource)
    {
        $dependencies = parent::getDependencies($resource);
    
        switch ($resource[1]) {
            case self::RESOURCE_NOTIFICATIONS:
                $dependencies[] = [PoP_BaseCollectionWebPlatform_VendorJSResourceLoaderProcessor::class, PoP_BaseCollectionWebPlatform_VendorJSResourceLoaderProcessor::RESOURCE_EXTERNAL_MOMENT];
                break;
        }

        return $dependencies;
    }
}


