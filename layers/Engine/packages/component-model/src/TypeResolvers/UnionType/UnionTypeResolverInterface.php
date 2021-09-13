<?php

declare(strict_types=1);

namespace PoP\ComponentModel\TypeResolvers\UnionType;

use PoP\ComponentModel\TypeResolvers\RelationalTypeResolverInterface;
use PoP\ComponentModel\ObjectTypeResolverPickers\ObjectTypeResolverPickerInterface;

interface UnionTypeResolverInterface extends RelationalTypeResolverInterface
{
    // public function addTypeToID(string | int $resultItemID): string;
    public function getObjectTypeResolverClassForResultItem(string | int $resultItemID);
    public function getTargetObjectTypeResolverPicker(object $resultItem): ?ObjectTypeResolverPickerInterface;
    public function getTargetObjectTypeResolver(object $resultItem): ?RelationalTypeResolverInterface;
    /**
     * @param array<string|int> $ids
     */
    public function getResultItemIDTargetTypeResolvers(array $ids): array;
    public function getTargetObjectTypeResolverClasses(): array;
    public function getSchemaTypeInterfaceTypeResolverClass(): ?string;
    /**
     * @return ObjectTypeResolverPickerInterface[]
     */
    public function getObjectTypeResolverPickers(): array;
}