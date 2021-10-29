<?php

declare(strict_types=1);

namespace PoP\AccessControl\RelationalTypeResolverDecorators;

use PoP\AccessControl\DirectiveResolvers\DisableAccessForDirectivesDirectiveResolver;
use Symfony\Contracts\Service\Attribute\Required;

abstract class AbstractDisableAccessConfigurableAccessControlForDirectivesInPublicSchemaRelationalTypeResolverDecorator extends AbstractConfigurableAccessControlForDirectivesInPublicSchemaRelationalTypeResolverDecorator
{
    private ?DisableAccessForDirectivesDirectiveResolver $disableAccessForDirectivesDirectiveResolver = null;

    public function setDisableAccessForDirectivesDirectiveResolver(DisableAccessForDirectivesDirectiveResolver $disableAccessForDirectivesDirectiveResolver): void
    {
        $this->disableAccessForDirectivesDirectiveResolver = $disableAccessForDirectivesDirectiveResolver;
    }
    protected function getDisableAccessForDirectivesDirectiveResolver(): DisableAccessForDirectivesDirectiveResolver
    {
        return $this->disableAccessForDirectivesDirectiveResolver ??= $this->instanceManager->getInstance(DisableAccessForDirectivesDirectiveResolver::class);
    }

    protected function getMandatoryDirectives(mixed $entryValue = null): array
    {
        $disableAccessDirective = $this->getFieldQueryInterpreter()->getDirective(
            $this->getDisableAccessForDirectivesDirectiveResolver()->getDirectiveName()
        );
        return [
            $disableAccessDirective,
        ];
    }
}
