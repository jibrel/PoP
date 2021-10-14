<?php

declare(strict_types=1);

namespace GraphQLByPoP\GraphQLServer\ObjectModels;

use PoP\ComponentModel\Schema\SchemaDefinition;

class EnumType extends AbstractDynamicType
{
    use NonDocumentableTypeTrait;

    /**
     * @var EnumValue[]
     */
    protected array $enumValues;

    public function __construct(array &$fullSchemaDefinition, array $schemaDefinitionPath, array $customDefinition = [])
    {
        parent::__construct($fullSchemaDefinition, $schemaDefinitionPath, $customDefinition);

        $this->initEnumValues($fullSchemaDefinition, $schemaDefinitionPath);
    }
    protected function initEnumValues(array &$fullSchemaDefinition, array $schemaDefinitionPath): void
    {
        $this->enumValues = [];
        if ($enumItems = $this->schemaDefinition[SchemaDefinition::ITEMS] ?? null) {
            foreach (array_keys($enumItems) as $enumValue) {
                $enumValueSchemaDefinitionPath = array_merge(
                    $schemaDefinitionPath,
                    [
                        SchemaDefinition::ITEMS,
                        $enumValue,
                    ]
                );
                $this->enumValues[] = new EnumValue(
                    $fullSchemaDefinition,
                    $enumValueSchemaDefinitionPath
                );
            }
        }
    }

    protected function getDynamicTypeNamePropertyInSchema(): string
    {
        // @todo Added temporary hack. Fix this!
        return 'Saronga';
        // return SchemaDefinition::ENUM_NAME;
    }
    public function getKind(): string
    {
        return TypeKinds::ENUM;
    }
    public function getEnumValues(bool $includeDeprecated = false): array
    {
        return $includeDeprecated ?
            $this->enumValues :
            array_filter(
                $this->enumValues,
                function (EnumValue $enumValue) {
                    return !$enumValue->isDeprecated();
                }
            );
    }
    public function getEnumValueIDs(bool $includeDeprecated = false): array
    {
        return array_map(
            function (EnumValue $enumValue) {
                return $enumValue->getID();
            },
            $this->getEnumValues($includeDeprecated)
        );
    }
}
