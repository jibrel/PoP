<?php

declare(strict_types=1);

namespace PoP\ComponentModel\ItemProcessors;

use PoP\Root\Instances\InstanceManagerInterface;

trait ItemProcessorManagerTrait
{
    abstract protected function getInstanceManager(): InstanceManagerInterface;

    /**
     * @var array<string, array>
     */
    private array $processors = [];
    /**
     * @var array<string, array>
     */
    private array $overridingClasses = [];

    /**
     * @deprecated Use the Service Container instead
     */
    public function overrideProcessorClass(string $overrideClass, string $withClass, array $forItemNames): void
    {
        foreach ($forItemNames as $forItemName) {
            $this->overridingClasses[$overrideClass][$forItemName] = $withClass;
        }
    }

    protected function hasItemBeenLoaded(array $item): bool
    {
        $itemProcessorClass = $item[0];
        $itemName = $item[1];
        return isset($this->processors[$itemProcessorClass][$itemName]);
    }

    public function getItemProcessor(array $item): mixed
    {
        $itemProcessorClass = $item[0];
        $itemName = $item[1];

        // Return the reference to the ItemProcessor instance, and created first if it doesn't exist
        if (!$this->hasItemBeenLoaded($item)) {
            // If this class was overriden, use that one instead. Priority goes like this:
            // 1. Overriden
            // 3. Same class as requested
            if ($class = $this->overridingClasses[$itemProcessorClass][$itemName] ?? null) {
                $itemProcessorClass = $class;
            }

            // Get the instance from the InstanceManager
            $processorInstance = $this->getInstanceManager()->getInstance($itemProcessorClass);
            $this->processors[$itemProcessorClass][$itemName] = $processorInstance;
        }

        return $this->processors[$itemProcessorClass][$itemName];
    }
}
