<?php

declare(strict_types=1);

namespace PoPSchema\Menus\TypeResolvers\InputObjectType;

use PoPSchema\Menus\Constants\MenuOrderBy;
use PoPSchema\Menus\TypeResolvers\EnumType\MenuOrderByEnumTypeResolver;
use PoPSchema\SchemaCommons\TypeResolvers\InputObjectType\SortInputObjectTypeResolver;

class MenuSortInputObjectTypeResolver extends SortInputObjectTypeResolver
{
    private ?MenuOrderByEnumTypeResolver $menuSortByEnumTypeResolver = null;

    final public function setMenuOrderByEnumTypeResolver(MenuOrderByEnumTypeResolver $menuSortByEnumTypeResolver): void
    {
        $this->menuSortByEnumTypeResolver = $menuSortByEnumTypeResolver;
    }
    final protected function getMenuOrderByEnumTypeResolver(): MenuOrderByEnumTypeResolver
    {
        return $this->menuSortByEnumTypeResolver ??= $this->instanceManager->getInstance(MenuOrderByEnumTypeResolver::class);
    }

    public function getTypeName(): string
    {
        return 'MenuSortInput';
    }

    public function getInputFieldNameTypeResolvers(): array
    {
        return array_merge(
            parent::getInputFieldNameTypeResolvers(),
            [
                'by' => $this->getMenuOrderByEnumTypeResolver(),
            ]
        );
    }

    public function getInputFieldDefaultValue(string $inputFieldName): ?string
    {
        return match ($inputFieldName) {
            'by' => MenuOrderBy::DATE,
            default => parent::getInputFieldDefaultValue($inputFieldName),
        };
    }
}