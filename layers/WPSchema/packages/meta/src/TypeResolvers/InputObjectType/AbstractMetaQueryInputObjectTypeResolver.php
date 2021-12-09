<?php

declare(strict_types=1);

namespace PoPWPSchema\Meta\TypeResolvers\InputObjectType;

use Exception;
use PoP\ComponentModel\TypeResolvers\InputObjectType\AbstractQueryableInputObjectTypeResolver;
use PoP\ComponentModel\TypeResolvers\InputTypeResolverInterface;
use PoP\Engine\TypeResolvers\ScalarType\StringScalarTypeResolver;
use PoPSchema\SchemaCommons\Services\AllowOrDenySettingsServiceInterface;
use PoPWPSchema\Meta\Constants\MetaQueryCompareByOperators;
use PoPWPSchema\Meta\Constants\MetaQueryValueTypes;
use PoPWPSchema\Meta\TypeResolvers\EnumType\MetaQueryValueTypeEnumTypeResolver;
use PoPWPSchema\SchemaCommons\TypeResolvers\EnumType\RelationEnumTypeResolver;
use stdClass;

abstract class AbstractMetaQueryInputObjectTypeResolver extends AbstractQueryableInputObjectTypeResolver
{
    private ?MetaQueryValueTypeEnumTypeResolver $metaQueryValueTypesEnumTypeResolver = null;
    private ?MetaQueryCompareByOneofInputObjectTypeResolver $metaQueryCompareByOneofInputObjectTypeResolver = null;
    private ?StringScalarTypeResolver $stringScalarTypeResolver = null;
    private ?RelationEnumTypeResolver $relationEnumTypeResolver = null;
    private ?AllowOrDenySettingsServiceInterface $allowOrDenySettingsService = null;

    final public function setMetaQueryValueTypesEnumTypeResolver(MetaQueryValueTypeEnumTypeResolver $metaQueryValueTypesEnumTypeResolver): void
    {
        $this->metaQueryValueTypesEnumTypeResolver = $metaQueryValueTypesEnumTypeResolver;
    }
    final protected function getMetaQueryValueTypesEnumTypeResolver(): MetaQueryValueTypeEnumTypeResolver
    {
        return $this->metaQueryValueTypesEnumTypeResolver ??= $this->instanceManager->getInstance(MetaQueryValueTypeEnumTypeResolver::class);
    }
    final public function setMetaQueryCompareByOneofInputObjectTypeResolver(MetaQueryCompareByOneofInputObjectTypeResolver $metaQueryCompareByOneofInputObjectTypeResolver): void
    {
        $this->metaQueryCompareByOneofInputObjectTypeResolver = $metaQueryCompareByOneofInputObjectTypeResolver;
    }
    final protected function getMetaQueryCompareByOneofInputObjectTypeResolver(): MetaQueryCompareByOneofInputObjectTypeResolver
    {
        return $this->metaQueryCompareByOneofInputObjectTypeResolver ??= $this->instanceManager->getInstance(MetaQueryCompareByOneofInputObjectTypeResolver::class);
    }
    final public function setStringScalarTypeResolver(StringScalarTypeResolver $stringScalarTypeResolver): void
    {
        $this->stringScalarTypeResolver = $stringScalarTypeResolver;
    }
    final protected function getStringScalarTypeResolver(): StringScalarTypeResolver
    {
        return $this->stringScalarTypeResolver ??= $this->instanceManager->getInstance(StringScalarTypeResolver::class);
    }
    final public function setRelationEnumTypeResolver(RelationEnumTypeResolver $relationEnumTypeResolver): void
    {
        $this->relationEnumTypeResolver = $relationEnumTypeResolver;
    }
    final protected function getRelationEnumTypeResolver(): RelationEnumTypeResolver
    {
        return $this->relationEnumTypeResolver ??= $this->instanceManager->getInstance(RelationEnumTypeResolver::class);
    }
    final public function setAllowOrDenySettingsService(AllowOrDenySettingsServiceInterface $allowOrDenySettingsService): void
    {
        $this->allowOrDenySettingsService = $allowOrDenySettingsService;
    }
    final protected function getAllowOrDenySettingsService(): AllowOrDenySettingsServiceInterface
    {
        return $this->allowOrDenySettingsService ??= $this->instanceManager->getInstance(AllowOrDenySettingsServiceInterface::class);
    }

    public function getTypeDescription(): ?string
    {
        return $this->getTranslationAPI()->__('Filter by meta key and value. The key must be allowed access in the Settings. See: https://developer.wordpress.org/reference/classes/wp_meta_query/', 'meta');
    }

    public function getInputFieldNameTypeResolvers(): array
    {
        return [
            'key' => $this->getStringScalarTypeResolver(),
            'type' => $this->getMetaQueryValueTypesEnumTypeResolver(),
            'compareBy' => $this->getMetaQueryCompareByOneofInputObjectTypeResolver(),
            'relation' => $this->getRelationEnumTypeResolver(),
        ];
    }

    public function getInputFieldDescription(string $inputFieldName): ?string
    {
        return match ($inputFieldName) {
            'key' => $this->getTranslationAPI()->__('Custom field key', 'meta'),
            'type' => $this->getTranslationAPI()->__('Custom field type', 'meta'),
            'compareBy' => $this->getTranslationAPI()->__('Value and operator to compare against', 'meta'),
            'relation' => $this->getTranslationAPI()->__('OR or AND, how the sub-arrays should be compared. Default: AND. Only the value from the first sub-array will be used', 'meta'),
            default => parent::getInputFieldDescription($inputFieldName),
        };
    }

    public function getInputFieldDefaultValue(string $inputFieldName): mixed
    {
        return match ($inputFieldName) {
            'type' => MetaQueryValueTypes::CHAR,
            default => parent::getInputFieldDescription($inputFieldName),
        };
    }

    /**
     * Custom validations to execute on the input field.
     *
     * @return string[] The produced error messages, if any
     */
    protected function resolveCoercedInputFieldValueErrorMessages(
        InputTypeResolverInterface $inputFieldTypeResolver,
        string $inputFieldName,
        mixed $coercedInputFieldValue,
    ): array {
        switch ($inputFieldName) {
            case 'key':
                if (
                    !$this->getAllowOrDenySettingsService()->isEntryAllowed(
                        $coercedInputFieldValue,
                        $this->getAllowOrDenyEntries(),
                        $this->getAllowOrDenyBehavior(),
                    )
                ) {
                    return [
                        sprintf(
                            $this->getTranslationAPI()->__('There is no meta with key \'%s\'', 'meta'),
                            $coercedInputFieldValue
                        )
                    ];
                }
                break;
        }
        return parent::resolveCoercedInputFieldValueErrorMessages(
            $inputFieldTypeResolver,
            $inputFieldName,
            $coercedInputFieldValue,
        );
    }

    /**
     * @return string[]
     */
    abstract protected function getAllowOrDenyEntries(): array;
    abstract protected function getAllowOrDenyBehavior(): string;

    /**
     * Integrate parameters into the "meta_query" WP_Query arg
     *
     * @see https://developer.wordpress.org/reference/classes/wp_meta_query/
     *
     * @param array<string, mixed> $query
     * @param stdClass|stdClass[]|array<stdClass[]> $inputValue
     */
    public function integrateInputValueToFilteringQueryArgs(array &$query, stdClass|array $inputValue): void
    {
        /** @var array $inputValue */
        $metaQuery = [];
        foreach ($inputValue as $inputValueElem) {
            $metaQueryElem = [];
            if (isset($inputValueElem->relation)) {
                $metaQueryElem['relation'] = $inputValueElem->relation;
            }
            $metaQueryElem['key'] = $inputValueElem->key;
            $metaQueryElem['type'] = $inputValueElem->type;
            $value = $operator = null;
            if (isset($inputValueElem->compareBy->key)) {
                $operator = $inputValueElem->compareBy->key->operator;
            } elseif (isset($inputValueElem->compareBy->numericValue)) {
                $value = $inputValueElem->compareBy->numericValue->value;
                $operator = $inputValueElem->compareBy->numericValue->operator;
            } elseif (isset($inputValueElem->compareBy->stringValue)) {
                $value = $inputValueElem->compareBy->stringValue->value;
                $operator = $inputValueElem->compareBy->stringValue->operator;
            } elseif (isset($inputValueElem->compareBy->arrayValue)) {
                $value = $inputValueElem->compareBy->arrayValue->value;
                $operator = $inputValueElem->compareBy->arrayValue->operator;
            } else {
                // It will never reach here
                continue;
            }
            if ($value !== null) {
                $metaQueryElem['value'] = $value;
            }
            if ($operator !== null) {
                $metaQueryElem['compare'] = $this->getOperatorFromInputValue($operator);
            }
            $metaQuery[] = $metaQueryElem;
        }
        if ($metaQuery !== []) {
            $query['meta_query'] = $metaQuery;
        }
    }

    protected function getOperatorFromInputValue(string $operator): string
    {
        return match ($operator) {
            MetaQueryCompareByOperators::EQUALS => '=',
            MetaQueryCompareByOperators::NOT_EQUALS => '!=',
            MetaQueryCompareByOperators::GREATER_THAN => '>',
            MetaQueryCompareByOperators::GREATER_THAN_OR_EQUAL => '>=',
            MetaQueryCompareByOperators::LESS_THAN => '<',
            MetaQueryCompareByOperators::LESS_THAN_OR_EQUAL => '<=',
            MetaQueryCompareByOperators::LIKE => 'LIKE',
            MetaQueryCompareByOperators::NOT_LIKE => 'NOT LIKE',
            MetaQueryCompareByOperators::IN => 'IN',
            MetaQueryCompareByOperators::NOT_IN => 'NOT IN',
            MetaQueryCompareByOperators::BETWEEN => 'BETWEEN',
            MetaQueryCompareByOperators::NOT_BETWEEN => 'NOT BETWEEN',
            MetaQueryCompareByOperators::EXISTS => 'EXISTS',
            MetaQueryCompareByOperators::NOT_EXISTS => 'NOT EXISTS',
            MetaQueryCompareByOperators::REGEXP => 'REGEXP',
            MetaQueryCompareByOperators::NOT_REGEXP => 'NOT REGEXP',
            MetaQueryCompareByOperators::RLIKE => 'RLIKE',
            default => new Exception(sprintf('Unknown operator \'%s\'', $operator)),
        };
    }
}