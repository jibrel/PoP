<?php

declare(strict_types=1);

namespace PoPSitesWassup\HighlightMutations\MutationResolverBridges;

use PoP\ComponentModel\MutationResolvers\MutationResolverInterface;
use PoPSitesWassup\HighlightMutations\MutationResolvers\CreateHighlightMutationResolver;
use Symfony\Contracts\Service\Attribute\Required;

class CreateHighlightMutationResolverBridge extends AbstractCreateUpdateHighlightMutationResolverBridge
{
    private ?CreateHighlightMutationResolver $createHighlightMutationResolver = null;

    public function setCreateHighlightMutationResolver(CreateHighlightMutationResolver $createHighlightMutationResolver): void
    {
        $this->createHighlightMutationResolver = $createHighlightMutationResolver;
    }
    protected function getCreateHighlightMutationResolver(): CreateHighlightMutationResolver
    {
        return $this->createHighlightMutationResolver ??= $this->instanceManager->getInstance(CreateHighlightMutationResolver::class);
    }

    public function getMutationResolver(): MutationResolverInterface
    {
        return $this->getCreateHighlightMutationResolver();
    }

    protected function isUpdate(): bool
    {
        return false;
    }
}
