<?php

declare(strict_types=1);

namespace PoPSchema\CustomPosts\FieldInterfaceResolvers;

use PoP\ComponentModel\Schema\SchemaDefinition;
use PoP\ComponentModel\Schema\SchemaTypeModifiers;
use PoPSchema\QueriedObject\FieldInterfaceResolvers\QueryableFieldInterfaceResolver;

class IsCustomPostFieldInterfaceResolver extends QueryableFieldInterfaceResolver
{
    public function getInterfaceName(): string
    {
        return 'IsCustomPost';
    }

    public function getImplementedFieldInterfaceResolverClasses(): array
    {
        return [
            QueryableFieldInterfaceResolver::class,
        ];
    }

    public function getSchemaInterfaceDescription(): ?string
    {
        return $this->translationAPI->__('Entities representing a custom post', 'customposts');
    }

    public function getFieldNamesToImplement(): array
    {
        return array_merge(
            parent::getFieldNamesToImplement(),
            [
                'datetime',
            ]
        );
    }

    public function getSchemaFieldType(string $fieldName): string
    {
        $types = [
            'datetime' => SchemaDefinition::TYPE_DATE,
        ];
        return $types[$fieldName] ?? parent::getSchemaFieldType($fieldName);
    }

    public function getSchemaFieldTypeModifiers(string $fieldName): ?int
    {
        /**
         * Please notice that the URL, slug, title and excerpt are nullable,
         * and content is not!
         */
        switch ($fieldName) {
            case 'datetime':
                return SchemaTypeModifiers::NON_NULLABLE;
        }
        return parent::getSchemaFieldTypeModifiers($fieldName);
    }

    public function getSchemaFieldDescription(string $fieldName): ?string
    {
        $descriptions = [
            'datetime' => $this->translationAPI->__('Custom post published date and time', 'customposts'),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($fieldName);
    }
    public function getSchemaFieldArgs(string $fieldName): array
    {
        $schemaFieldArgs = parent::getSchemaFieldArgs($fieldName);
        switch ($fieldName) {
            case 'datetime':
                return array_merge(
                    $schemaFieldArgs,
                    [
                        [
                            SchemaDefinition::ARGNAME_NAME => 'format',
                            SchemaDefinition::ARGNAME_TYPE => SchemaDefinition::TYPE_STRING,
                            SchemaDefinition::ARGNAME_DESCRIPTION => sprintf(
                                $this->translationAPI->__('Date and time format, as defined in %s. Default value: \'%s\' (for current year date) or \'%s\' (otherwise)', 'customposts'),
                                'https://www.php.net/manual/en/function.date.php',
                                'j M, H:i',
                                'j M Y, H:i'
                            ),
                        ],
                    ]
                );
        }

        return $schemaFieldArgs;
    }
}