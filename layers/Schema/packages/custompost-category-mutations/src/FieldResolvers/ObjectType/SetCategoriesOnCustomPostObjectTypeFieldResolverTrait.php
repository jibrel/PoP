<?php

declare(strict_types=1);

namespace PoPSchema\CustomPostCategoryMutations\FieldResolvers\ObjectType;

use PoP\ComponentModel\Services\WithInstanceManagerServiceTrait;
use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\Translation\TranslationAPIInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait SetCategoriesOnCustomPostObjectTypeFieldResolverTrait
{
    // use WithInstanceManagerServiceTrait;

    protected function getEntityName(): string
    {
        return $this->getTranslationAPI()->__('custom post', 'custompost-category-mutations');
    }
}
