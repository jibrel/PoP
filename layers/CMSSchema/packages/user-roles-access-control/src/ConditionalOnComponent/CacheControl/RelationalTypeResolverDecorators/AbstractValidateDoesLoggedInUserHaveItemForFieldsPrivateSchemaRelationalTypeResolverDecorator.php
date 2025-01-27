<?php

declare(strict_types=1);

namespace PoPCMSSchema\UserRolesAccessControl\ConditionalOnComponent\CacheControl\RelationalTypeResolverDecorators;

use PoP\AccessControl\RelationalTypeResolverDecorators\AbstractConfigurableAccessControlForFieldsInPrivateSchemaRelationalTypeResolverDecorator;
use PoPCMSSchema\UserStateAccessControl\ConditionalOnComponent\CacheControl\RelationalTypeResolverDecorators\NoCacheConfigurableAccessControlRelationalTypeResolverDecoratorTrait;

abstract class AbstractValidateDoesLoggedInUserHaveItemForFieldsPrivateSchemaRelationalTypeResolverDecorator extends AbstractConfigurableAccessControlForFieldsInPrivateSchemaRelationalTypeResolverDecorator
{
    use NoCacheConfigurableAccessControlRelationalTypeResolverDecoratorTrait;
}
