<?php

declare(strict_types=1);

namespace PoPSchema\UserStateAccessControl\RelationalTypeResolverDecorators;

use PoP\ComponentModel\DirectiveResolvers\DirectiveResolverInterface;
use PoPSchema\UserStateAccessControl\ConfigurationEntries\UserStates;
use PoPSchema\UserStateAccessControl\DirectiveResolvers\ValidateIsUserLoggedInDirectiveResolver;
use Symfony\Contracts\Service\Attribute\Required;

trait ValidateUserLoggedInForFieldsRelationalTypeResolverDecoratorTrait
{
    private ?ValidateIsUserLoggedInDirectiveResolver $validateIsUserLoggedInDirectiveResolver = null;

    public function setValidateIsUserLoggedInDirectiveResolver(ValidateIsUserLoggedInDirectiveResolver $validateIsUserLoggedInDirectiveResolver): void
    {
        $this->validateIsUserLoggedInDirectiveResolver = $validateIsUserLoggedInDirectiveResolver;
    }
    protected function getValidateIsUserLoggedInDirectiveResolver(): ValidateIsUserLoggedInDirectiveResolver
    {
        return $this->validateIsUserLoggedInDirectiveResolver ??= $this->instanceManager->getInstance(ValidateIsUserLoggedInDirectiveResolver::class);
    }

    protected function removeFieldNameBasedOnMatchingEntryValue($entryValue = null): bool
    {
        return UserStates::IN == $entryValue;
    }
    protected function getValidateUserStateDirectiveResolver(): DirectiveResolverInterface
    {
        return $this->getValidateIsUserLoggedInDirectiveResolver();
    }
}
