<?php
$class = (new class() extends \PoP\Root\Component\AbstractComponent
{
    /**
     * Classes from PoP components that must be initialized before this component
     *
     * @return string[]
     */
    public function getDependedComponentClasses(): array
    {
        return [];
    }

    /**
     * Boot component
     */
    public function beforeBoot(): void
    {
        parent::beforeBoot();

        // Initialize code
        require_once 'migrate/pop-meta.php';
    }
});
\PoP\Root\StateManagers\ComponentManager::register(get_class($class));
$class::initialize();
