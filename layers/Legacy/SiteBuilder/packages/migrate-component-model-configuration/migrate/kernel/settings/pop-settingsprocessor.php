<?php
namespace PoP\ComponentModel\Settings;

abstract class SettingsProcessorBase
{
    public function __construct()
    {

        // Comment Leo 30/09/2017: Important: do it at the very end, to make sure that
        // all constants have been set by then (otherwise, in file settingsprocessor.pht
        // it may add the configuration under page "POP_CATEGORYPOSTS_ROUTE_CATEGORYPOSTS01",
        // it is not treated as false if the constant has not been defined)
        \PoP\Root\App::addAction(
            'init', // Must migrate this WP hook to one from PoP (which executes before AFTER_BOOT_APPLICATION
            $this->init(...), 
            PHP_INT_MAX
        );
    }

    public function init()
    {
        SettingsProcessorManagerFactory::getInstance()->add($this);
    }

    abstract public function routesToProcess();

    // function getCheckpointConfiguration() {
    public function getCheckpoints()
    {
        return array();
    }

    public function isFunctional()
    {
        return false;
    }

    public function isForInternalUse()
    {
        return false;
    }

    public function needsTargetId()
    {
        return false;
    }

    public function getRedirectUrl()
    {
        return null;
    }
}
