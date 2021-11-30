<?php

declare(strict_types=1);

namespace PoPWPSchema\Menus\Overrides\TypeResolvers\InputObjectType;

use PoP\Engine\TypeResolvers\ScalarType\StringScalarTypeResolver;
use PoPSchema\Menus\TypeResolvers\InputObjectType\MenuByInputObjectTypeResolver as UpstreamMenuByInputObjectTypeResolver;
use PoPWPSchema\Menus\TypeResolvers\EnumType\MenuLocationEnumTypeResolver;

class MenuByInputObjectTypeResolver extends UpstreamMenuByInputObjectTypeResolver
{
    private ?StringScalarTypeResolver $stringScalarTypeResolver = null;
    private ?MenuLocationEnumTypeResolver $menuLocationEnumTypeResolver = null;

    final public function setStringScalarTypeResolver(StringScalarTypeResolver $stringScalarTypeResolver): void
    {
        $this->stringScalarTypeResolver = $stringScalarTypeResolver;
    }
    final protected function getStringScalarTypeResolver(): StringScalarTypeResolver
    {
        return $this->stringScalarTypeResolver ??= $this->instanceManager->getInstance(StringScalarTypeResolver::class);
    }
    final public function setMenuLocationEnumTypeResolver(MenuLocationEnumTypeResolver $menuLocationEnumTypeResolver): void
    {
        $this->menuLocationEnumTypeResolver = $menuLocationEnumTypeResolver;
    }
    final protected function getMenuLocationEnumTypeResolver(): MenuLocationEnumTypeResolver
    {
        return $this->menuLocationEnumTypeResolver ??= $this->instanceManager->getInstance(MenuLocationEnumTypeResolver::class);
    }

    public function getInputFieldNameTypeResolvers(): array
    {
        return array_merge(
            parent::getInputFieldNameTypeResolvers(),
            [
                'slug' => $this->getStringScalarTypeResolver(),
                'location' => $this->getMenuLocationEnumTypeResolver(),
            ]
        );
    }

    public function getInputFieldDescription(string $inputFieldName): ?string
    {
        return match ($inputFieldName) {
            'slug' => $this->getTranslationAPI()->__('Query by slug', 'menus'),
            'location' => $this->getTranslationAPI()->__('Query by location', 'menus'),
            default => parent::getInputFieldDescription($inputFieldName),
        };
    }
}