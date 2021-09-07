<?php

declare(strict_types=1);

namespace PoP\ComponentModel\FieldInterfaceResolvers;

use PoP\ComponentModel\FieldInterfaceResolvers\AbstractFieldInterfaceResolver;
use PoP\ComponentModel\Schema\SchemaDefinition;
use PoP\ComponentModel\Schema\SchemaTypeModifiers;
use PoP\ComponentModel\TypeResolvers\Interface\ElementalInterfaceTypeResolver;

class ElementalFieldInterfaceResolver extends AbstractFieldInterfaceResolver
{
    public function getClassesToAttachTo(): array
    {
        return array(ElementalInterfaceTypeResolver::class);
    }

    public function getInterfaceName(): string
    {
        return 'Elemental';
    }

    public function getSchemaInterfaceDescription(): ?string
    {
        return $this->translationAPI->__('The fundamental fields that must be implemented by all objects', 'component-model');
    }

    public function getFieldNamesToImplement(): array
    {
        return [
            'id',
        ];
    }

    public function getSchemaFieldType(string $fieldName): string
    {
        return match ($fieldName) {
            'id' => SchemaDefinition::TYPE_ID,
            default => parent::getSchemaFieldType($fieldName),
        };
    }

    public function getSchemaFieldTypeModifiers(string $fieldName): ?int
    {
        switch ($fieldName) {
            case 'id':
                return SchemaTypeModifiers::NON_NULLABLE;
        }
        return parent::getSchemaFieldTypeModifiers($fieldName);
    }

    public function getSchemaFieldDescription(string $fieldName): ?string
    {
        $descriptions = [
            'id' => $this->translationAPI->__('The object\'s unique identifier for its type', 'component-model'),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($fieldName);
    }
}
