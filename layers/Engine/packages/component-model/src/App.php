<?php

declare(strict_types=1);

namespace PoP\ComponentModel;

use LogicException;
use PoP\ComponentModel\MutationResolution\MutationResolutionStore;
use PoP\ComponentModel\MutationResolution\MutationResolutionStoreInterface;
use PoP\Root\App as RootApp;
use PoP\Root\AppInterface as RootAppInterface;
use PoP\Root\AppLoader;
use PoP\Root\Component\ComponentInterface;
use PoP\Root\Container\ContainerBuilderFactory;
use PoP\Root\Container\SystemContainerBuilderFactory;
use PoP\Root\Managers\ComponentManager;
use Symfony\Component\DependencyInjection\Container;

/**
 * Decorator wrapping the single class App hosting all the top-level instances,
 * plus addition of properties needed for the plugin.
 *
 * Using composition instead of inheritance, so that the original PoP\Root\App
 * is the single source of truth
 */
class App implements AppInterface, RootAppInterface
{
    protected static MutationResolutionStoreInterface $mutationResolutionManager;
    
    public static function initializeComponentModel(
        ?MutationResolutionStoreInterface $mutationResolutionManager = null,
    ): void {
        self::$mutationResolutionManager = $mutationResolutionManager ?? static::createMutationResolutionStore();
    }

    protected static function createMutationResolutionStore(): MutationResolutionStoreInterface
    {
        return new MutationResolutionStore();
    }

    public static function getMutationResolutionStore(): MutationResolutionStoreInterface
    {
        return self::$mutationResolutionManager;
    }

    /**
     * This function must be invoked at the very beginning,
     * to initialize the instance to run the application.
     *
     * Either inject the desired instance, or have the Root
     * provide the default one.
     */
    public static function initialize(
        ?AppLoader $appLoader = null,
        ?ContainerBuilderFactory $containerBuilderFactory = null,
        ?SystemContainerBuilderFactory $systemContainerBuilderFactory = null,
        ?ComponentManager $componentManager = null,
    ): void {
        RootApp::initialize(
            $appLoader,
            $containerBuilderFactory,
            $systemContainerBuilderFactory,
            $componentManager,
        );
    }

    public static function getAppLoader(): AppLoader
    {
        return RootApp::getAppLoader();
    }

    public static function getContainerBuilderFactory(): ContainerBuilderFactory
    {
        return RootApp::getContainerBuilderFactory();
    }

    public static function getSystemContainerBuilderFactory(): SystemContainerBuilderFactory
    {
        return RootApp::getSystemContainerBuilderFactory();
    }

    public static function getComponentManager(): ComponentManager
    {
        return RootApp::getComponentManager();
    }

    /**
     * Store Component classes to be initialized, and
     * inject them into the AppLoader when this is initialized.
     *
     * @param string[] $componentClasses List of `Component` class to initialize
     */
    public static function stockAndInitializeComponentClasses(
        array $componentClasses
    ): void {
        RootApp::stockAndInitializeComponentClasses($componentClasses);
    }

    /**
     * Shortcut function.
     */
    final public static function getContainer(): Container
    {
        return RootApp::getContainer();
    }

    /**
     * Shortcut function.
     */
    final public static function getSystemContainer(): Container
    {
        return RootApp::getSystemContainer();
    }

    /**
     * Shortcut function.
     *
     * @throws LogicException
     */
    final public static function getComponent(string $componentClass): ComponentInterface
    {
        return RootApp::getComponent($componentClass);
    }
}
