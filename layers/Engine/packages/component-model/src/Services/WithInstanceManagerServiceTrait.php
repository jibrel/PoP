<?php

declare(strict_types=1);

namespace PoP\ComponentModel\Services;

use PoP\ComponentModel\Instances\InstanceManagerInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait WithInstanceManagerServiceTrait
{
    protected InstanceManagerInterface $instanceManager;

    #[Required]
    public function setInstanceManager(InstanceManagerInterface $instanceManager): void
    {
        $this->instanceManager = $instanceManager;
    }
}
