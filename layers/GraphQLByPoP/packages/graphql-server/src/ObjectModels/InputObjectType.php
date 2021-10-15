<?php

declare(strict_types=1);

namespace GraphQLByPoP\GraphQLServer\ObjectModels;

use PoP\ComponentModel\Schema\SchemaDefinition;

class InputObjectType extends AbstractType
{
    /**
     * @var InputValue[]
     */
    protected array $inputValues;

    public function __construct(array &$fullSchemaDefinition, array $schemaDefinitionPath)
    {
        parent::__construct($fullSchemaDefinition, $schemaDefinitionPath);

        $this->initInputValues($fullSchemaDefinition, $schemaDefinitionPath);
        foreach ($this->inputValues as $inputValue) {
            $inputValue->initializeTypeDependencies();
        }
    }
    protected function initInputValues(array &$fullSchemaDefinition, array $schemaDefinitionPath): void
    {
        $this->inputValues = [];
        if ($inputValues = $this->schemaDefinition[SchemaDefinition::ARGS] ?? null) {
            foreach (array_keys($inputValues) as $inputValueName) {
                $inputValueSchemaDefinitionPath = array_merge(
                    $schemaDefinitionPath,
                    [
                        SchemaDefinition::ARGS,
                        $inputValueName,
                    ]
                );
                $this->inputValues[] = new InputValue(
                    $fullSchemaDefinition,
                    $inputValueSchemaDefinitionPath
                );
            }
        }
    }

    protected function getDynamicTypeNamePropertyInSchema(): string
    {
        return SchemaDefinition::INPUT_OBJECT_NAME;
    }
    public function getKind(): string
    {
        return TypeKinds::INPUT_OBJECT;
    }
    public function getInputFields(): array
    {
        return $this->inputValues;
    }
    public function getInputFieldIDs(): array
    {
        return array_map(
            function (InputValue $inputValue) {
                return $inputValue->getID();
            },
            $this->getInputFields()
        );
    }
}
