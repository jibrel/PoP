<?php

declare(strict_types=1);

namespace PoP\Root\State;

abstract class AbstractAppStateProvider implements AppStateProviderInterface
{
    public function __construct()
    {
    }

    public function augment(array &$state): void
    {
    }
}
