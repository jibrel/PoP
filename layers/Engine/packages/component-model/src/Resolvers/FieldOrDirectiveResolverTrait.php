<?php

declare(strict_types=1);

namespace PoP\ComponentModel\Resolvers;

use PoP\ComponentModel\Schema\SchemaHelpers;
use PoP\ComponentModel\Schema\FieldQueryUtils;
use PoP\ComponentModel\Schema\SchemaDefinition;
use PoP\Translation\Facades\TranslationAPIFacade;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;

trait FieldOrDirectiveResolverTrait
{
    /**
     * @var array<array|null>
     */
    protected array $enumValueArgumentValidationCache = [];

    protected function maybeValidateNotMissingFieldOrDirectiveArguments(TypeResolverInterface $typeResolver, string $fieldOrDirectiveName, array $fieldOrDirectiveArgs, array $fieldOrDirectiveArgsSchemaDefinition, string $type): ?string
    {
        if ($mandatoryArgs = SchemaHelpers::getSchemaMandatoryFieldOrDirectiveArgs($fieldOrDirectiveArgsSchemaDefinition)) {
            if (
                $maybeError = $this->validateNotMissingFieldOrDirectiveArguments(
                    SchemaHelpers::getSchemaFieldArgNames($mandatoryArgs),
                    $fieldOrDirectiveName,
                    $fieldOrDirectiveArgs,
                    $type
                )
            ) {
                return $maybeError;
            }
        }
        return null;
    }

    protected function validateNotMissingFieldOrDirectiveArguments(array $fieldOrDirectiveArgumentProperties, string $fieldOrDirectiveName, array $fieldOrDirectiveArgs, string $type): ?string
    {
        if ($missing = SchemaHelpers::getMissingFieldArgs($fieldOrDirectiveArgumentProperties, $fieldOrDirectiveArgs)) {
            $translationAPI = TranslationAPIFacade::getInstance();
            return count($missing) == 1 ?
                sprintf(
                    $translationAPI->__('Argument \'%1$s\' cannot be empty, so %2$s \'%3$s\' has been ignored', 'component-model'),
                    $missing[0],
                    $type == ResolverTypes::FIELD ? $translationAPI->__('field', 'component-model') : $translationAPI->__('directive', 'component-model'),
                    $fieldOrDirectiveName
                ) :
                sprintf(
                    $translationAPI->__('Arguments \'%1$s\' cannot be empty, so %2$s \'%3$s\' has been ignored', 'component-model'),
                    implode($translationAPI->__('\', \''), $missing),
                    $type == ResolverTypes::FIELD ? $translationAPI->__('field', 'component-model') : $translationAPI->__('directive', 'component-model'),
                    $fieldOrDirectiveName
                );
        }
        return null;
    }

    /**
     * Important: The validations below can only be done if no fieldArg contains a field!
     * That is because this is a schema error, so we still don't have the $resultItem against which to resolve the field
     * For instance, this doesn't work: /?query=arrayItem(posts(),3)
     * In that case, the validation will be done inside ->resolveValue(),
     * and will be treated as a $dbError, not a $schemaError
     */
    protected function maybeValidateEnumFieldOrDirectiveArguments(TypeResolverInterface $typeResolver, string $fieldOrDirectiveName, array $fieldOrDirectiveArgs, array $fieldOrDirectiveArgsSchemaDefinition, string $type): ?array
    {
        if (!FieldQueryUtils::isAnyFieldArgumentValueAField($fieldOrDirectiveArgs)) {
            // Iterate all the enum types and check that the provided values is one of them, or throw an error
            if ($enumTypeFieldOrDirectiveArgsSchemaDefinition = SchemaHelpers::getEnumTypeFieldOrDirectiveArgsSchemaDefinition($fieldOrDirectiveArgsSchemaDefinition)) {
                return $this->validateEnumFieldOrDirectiveArguments(
                    $enumTypeFieldOrDirectiveArgsSchemaDefinition,
                    $fieldOrDirectiveName,
                    $fieldOrDirectiveArgs,
                    $type
                );
            }
        }
        return null;
    }

    protected function validateEnumFieldOrDirectiveArguments(array $enumTypeFieldOrDirectiveArgsSchemaDefinition, string $fieldOrDirectiveName, array $fieldOrDirectiveArgs, string $type): ?array
    {
        $key = serialize($enumTypeFieldOrDirectiveArgsSchemaDefinition) . '|' . $fieldOrDirectiveName . serialize($fieldOrDirectiveArgs);
        if (!isset($this->enumValueArgumentValidationCache[$key])) {
            $this->enumValueArgumentValidationCache[$key] = $this->doValidateEnumFieldOrDirectiveArguments($enumTypeFieldOrDirectiveArgsSchemaDefinition, $fieldOrDirectiveName, $fieldOrDirectiveArgs, $type);
        }
        return $this->enumValueArgumentValidationCache[$key];
    }
    protected function doValidateEnumFieldOrDirectiveArguments(array $enumTypeFieldOrDirectiveArgsSchemaDefinition, string $fieldOrDirectiveName, array $fieldOrDirectiveArgs, string $type): ?array
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        $errors = $deprecations = [];
        $fieldOrDirectiveArgumentNames = SchemaHelpers::getSchemaFieldArgNames($enumTypeFieldOrDirectiveArgsSchemaDefinition);
        $schemaFieldArgumentEnumValueDefinitions = SchemaHelpers::getSchemaFieldArgEnumValueDefinitions($enumTypeFieldOrDirectiveArgsSchemaDefinition);
        for ($i = 0; $i < count($fieldOrDirectiveArgumentNames); $i++) {
            $fieldOrDirectiveArgumentName = $fieldOrDirectiveArgumentNames[$i];
            $fieldOrDirectiveArgumentValue = $fieldOrDirectiveArgs[$fieldOrDirectiveArgumentName] ?? null;
            if ($fieldOrDirectiveArgumentValue !== null) {
                // Check if it's an array or not from the schema definition
                $enumTypeFieldOrDirectiveArgSchemaDefinition = $enumTypeFieldOrDirectiveArgsSchemaDefinition[$fieldOrDirectiveArgumentName];
                $enumTypeFieldOrDirectiveArgIsArray = $enumTypeFieldOrDirectiveArgSchemaDefinition[SchemaDefinition::ARGNAME_IS_ARRAY] ?? false;
                // Each fieldArgumentEnumValue is an array with item "name" for sure, and maybe also "description", "deprecated" and "deprecationDescription"
                $schemaFieldOrDirectiveArgumentEnumValues = $schemaFieldArgumentEnumValueDefinitions[$fieldOrDirectiveArgumentName];
                if ($enumTypeFieldOrDirectiveArgIsArray) {
                    if (!is_array($fieldOrDirectiveArgumentValue)) {
                        $errors[] = sprintf(
                            $translationAPI->__('The value for argument \'%1$s\' in %2$s \'%3$s\' must be an array', 'component-model'),
                            $fieldOrDirectiveArgumentName,
                            $type == ResolverTypes::FIELD ? $translationAPI->__('field', 'component-model') : $translationAPI->__('directive', 'component-model'),
                            $fieldOrDirectiveName
                        );
                        continue;
                    }
                    $this->doValidateEnumFieldOrDirectiveArgumentsItem(
                        $errors,
                        $deprecations,
                        $schemaFieldOrDirectiveArgumentEnumValues,
                        $fieldOrDirectiveArgumentValue,
                        $fieldOrDirectiveArgumentName,
                        $fieldOrDirectiveName,
                        $type,
                    );
                } else {
                    if (is_array($fieldOrDirectiveArgumentValue)) {
                        $errors[] = sprintf(
                            $translationAPI->__('The value for argument \'%1$s\' in %2$s \'%3$s\' must not be an array', 'component-model'),
                            $fieldOrDirectiveArgumentName,
                            $type == ResolverTypes::FIELD ? $translationAPI->__('field', 'component-model') : $translationAPI->__('directive', 'component-model'),
                            $fieldOrDirectiveName
                        );
                        continue;
                    }
                    $this->doValidateEnumFieldOrDirectiveArgumentsItem(
                        $errors,
                        $deprecations,
                        $schemaFieldOrDirectiveArgumentEnumValues,
                        [$fieldOrDirectiveArgumentValue],
                        $fieldOrDirectiveArgumentName,
                        $fieldOrDirectiveName,
                        $type,
                    );
                }
            }
        }
        // if ($errors) {
        //     return implode($translationAPI->__('. '), $errors);
        // }
        // Array of 2 items: errors and deprecations
        if ($errors || $deprecations) {
            return [
                $errors ? implode($translationAPI->__('. '), $errors) : null,
                $deprecations ? implode($translationAPI->__('. '), $deprecations) : null,
            ];
        }
        return null;
    }

    protected function doValidateEnumFieldOrDirectiveArgumentsItem(
        array &$errors,
        array &$deprecations,
        array $schemaFieldOrDirectiveArgumentEnumValues,
        array $fieldOrDirectiveArgumentValueItems,
        string $fieldOrDirectiveArgumentName,
        string $fieldOrDirectiveName,
        string $type
    ): void {
        $translationAPI = TranslationAPIFacade::getInstance();
        $errorItems = $deprecationItems = [];
        foreach ($fieldOrDirectiveArgumentValueItems as $fieldOrDirectiveArgumentValueItem) {
            $fieldOrDirectiveArgumentValueDefinition = $schemaFieldOrDirectiveArgumentEnumValues[$fieldOrDirectiveArgumentValueItem];
            if ($fieldOrDirectiveArgumentValueDefinition === null) {
                // Remove deprecated ones and extract their names
                $fieldOrDirectiveArgumentEnumValues = SchemaHelpers::removeDeprecatedEnumValuesFromSchemaDefinition($schemaFieldOrDirectiveArgumentEnumValues);
                $fieldOrDirectiveArgumentEnumValues = array_keys($fieldOrDirectiveArgumentEnumValues);
                $errorItems[] = $fieldOrDirectiveArgumentValueItem;
            } elseif ($fieldOrDirectiveArgumentValueDefinition[SchemaDefinition::ARGNAME_DEPRECATED] ?? null) {
                // Check if this enumValue is deprecated
                $deprecationItems[] = $fieldOrDirectiveArgumentValueItem;
            }
        }
        if ($errorItems) {
            if (count($errorItems) === 1) {
                $errors[] = sprintf(
                    $translationAPI->__('Value \'%1$s\' for argument \'%2$s\' in %3$s \'%4$s\' is not allowed (the only allowed values are: \'%5$s\')', 'component-model'),
                    implode($translationAPI->__('\', \''), $errorItems),
                    $fieldOrDirectiveArgumentName,
                    $type == ResolverTypes::FIELD ? $translationAPI->__('field', 'component-model') : $translationAPI->__('directive', 'component-model'),
                    $fieldOrDirectiveName,
                    implode($translationAPI->__('\', \''), $fieldOrDirectiveArgumentEnumValues)
                );
            } else {
                $errors[] = sprintf(
                    $translationAPI->__('Values \'%1$s\' for argument \'%2$s\' in %3$s \'%4$s\' are not allowed (the only allowed values are: \'%5$s\')', 'component-model'),
                    implode($translationAPI->__('\', \''), $errorItems),
                    $fieldOrDirectiveArgumentName,
                    $type == ResolverTypes::FIELD ? $translationAPI->__('field', 'component-model') : $translationAPI->__('directive', 'component-model'),
                    $fieldOrDirectiveName,
                    implode($translationAPI->__('\', \''), $fieldOrDirectiveArgumentEnumValues)
                );
            }
        }
        if ($deprecationItems) {
            if (count($deprecationItems) === 1) {
                $deprecations[] = sprintf(
                    $translationAPI->__('Value \'%1$s\' for argument \'%2$s\' in %3$s \'%4$s\' is deprecated: \'%5$s\'', 'component-model'),
                    implode($translationAPI->__('\', \''), $deprecationItems),
                    $fieldOrDirectiveArgumentName,
                    $type == ResolverTypes::FIELD ? $translationAPI->__('field', 'component-model') : $translationAPI->__('directive', 'component-model'),
                    $fieldOrDirectiveName,
                    $fieldOrDirectiveArgumentValueDefinition[SchemaDefinition::ARGNAME_DEPRECATIONDESCRIPTION]
                );
            } else {
                $deprecations[] = sprintf(
                    $translationAPI->__('Values \'%1$s\' for argument \'%2$s\' in %3$s \'%4$s\' are deprecated: \'%5$s\'', 'component-model'),
                    implode($translationAPI->__('\', \''), $deprecationItems),
                    $fieldOrDirectiveArgumentName,
                    $type == ResolverTypes::FIELD ? $translationAPI->__('field', 'component-model') : $translationAPI->__('directive', 'component-model'),
                    $fieldOrDirectiveName,
                    $fieldOrDirectiveArgumentValueDefinition[SchemaDefinition::ARGNAME_DEPRECATIONDESCRIPTION]
                );
            }
        }
    }
}
