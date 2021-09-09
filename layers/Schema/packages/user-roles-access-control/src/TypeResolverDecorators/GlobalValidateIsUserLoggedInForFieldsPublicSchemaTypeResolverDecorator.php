<?php

declare(strict_types=1);

namespace PoPSchema\UserRolesAccessControl\TypeResolverDecorators;

use PoP\ComponentModel\TypeResolvers\AbstractRelationalTypeResolver;
use PoPSchema\UserRolesAccessControl\DirectiveResolvers\ValidateDoesLoggedInUserHaveAnyCapabilityDirectiveResolver;
use PoPSchema\UserRolesAccessControl\DirectiveResolvers\ValidateDoesLoggedInUserHaveAnyRoleDirectiveResolver;
use PoPSchema\UserStateAccessControl\TypeResolverDecorators\AbstractValidateIsUserLoggedInForFieldsPublicSchemaTypeResolverDecorator;

class GlobalValidateIsUserLoggedInForFieldsPublicSchemaTypeResolverDecorator extends AbstractValidateIsUserLoggedInForFieldsPublicSchemaTypeResolverDecorator
{
    public function getRelationalTypeResolverClassesToAttachTo(): array
    {
        return [
            AbstractRelationalTypeResolver::class,
        ];
    }

    /**
     * Provide the classes for all the directiveResolverClasses that need the "validateIsUserLoggedIn" directive
     */
    protected function getDirectiveResolverClasses(): array
    {
        return [
            ValidateDoesLoggedInUserHaveAnyRoleDirectiveResolver::class,
            ValidateDoesLoggedInUserHaveAnyCapabilityDirectiveResolver::class,
        ];
    }
}
