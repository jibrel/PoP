<?php

declare(strict_types=1);

namespace PoP\Root\Managers;

use LogicException;
use PoP\Root\Facades\Registries\AppStateProviderRegistryFacade;
use PoP\Translation\Facades\TranslationAPIFacade;

/**
 * Keep a reference to the global, shared state by the App
 */
class AppStateManager
{
    /**
     * The state, stored under their own property as added by each Component
     *
     * @var array<string,mixed>
     */
    protected array $state;

    /**
     * Called by the AppLoader to initalize the state.
     *
     * Initialize application state
     */
    public function initializeAppState(): void
    {
        $this->state = [];
        $appStateProviderRegistry = AppStateProviderRegistryFacade::getInstance();
        $appStateProviders = $appStateProviderRegistry->getEnabledAppStateProviders();

        // First pass: initialize
        foreach ($appStateProviders as $appStateProvider) {
            $appStateProvider->initialize($this->state);
        }

        // Second pass: consolidate
        foreach ($appStateProviders as $appStateProvider) {
            $appStateProvider->consolidate($this->state);
        }

        // Third pass: augment
        foreach ($appStateProviders as $appStateProvider) {
            $appStateProvider->augment($this->state);
        }

        // Final pass: compute
        foreach ($appStateProviders as $appStateProvider) {
            $appStateProvider->compute($this->state);
        }
    }

    public function all(): array
    {
        return $this->state;
    }

    /**
     * To be called by Engine. Use with care!
     */
    public function override(string $key, mixed $value): void
    {
        $this->state[$key] = $value;
    }

    /**
     * @throws LogicException
     */
    public function get(string $key): mixed
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        if (!array_key_exists($key, $this->state)) {
            throw new LogicException(
                \sprintf(
                    $translationAPI->__('There is no application state under key \'%s\'', 'root'),
                    $key
                )
            );
        }
        return $this->state[$key] ?? null;
    }

    /**
     * @throws LogicException
     */
    public function getUnder(array $path): mixed
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        $state = &$this->state;
        foreach ($path as $pathItem) {
            if (!array_key_exists($pathItem, $state)) {
                throw new LogicException(
                    \sprintf(
                        $translationAPI->__('There is no application state under path \'%s\'', 'root'),
                        implode(
                            $translationAPI->__(',', 'root'),
                            $path
                        )
                    )
                );
            }
            $state = &$state[$pathItem];
        }
        return $state;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->state);
    }

    /**
     * @throws LogicException
     */
    public function hasUnder(array $path): bool
    {
        $state = &$this->state;
        foreach ($path as $pathItem) {
            if (!array_key_exists($pathItem, $state)) {
                return false;
            }
            $state = &$state[$pathItem];
        }
        return true;
    }
}