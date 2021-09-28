<?php

declare(strict_types=1);

namespace PoP\AccessControl\RelationalTypeResolverDecorators;

use PoP\ComponentModel\Instances\InstanceManagerInterface;
use PoP\AccessControl\Services\AccessControlManagerInterface;
use PoP\ComponentModel\Schema\FieldQueryInterpreterInterface;

abstract class AbstractConfigurableAccessControlForDirectivesInPublicSchemaRelationalTypeResolverDecorator extends AbstractPublicSchemaRelationalTypeResolverDecorator
{
    use ConfigurableAccessControlForDirectivesRelationalTypeResolverDecoratorTrait;
    protected AccessControlManagerInterface $accessControlManager;

    public function __construct(
        AccessControlManagerInterface $accessControlManager,
    ) {
        $this->accessControlManager = $accessControlManager;
        }
}
