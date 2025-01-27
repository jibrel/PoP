<?php

declare(strict_types=1);

namespace PoPCMSSchema\CustomPosts\TypeResolvers\InputObjectType;

use PoP\Root\App;
use PoP\ComponentModel\Schema\SchemaTypeModifiers;
use PoP\ComponentModel\TypeResolvers\ScalarType\StringScalarTypeResolver;
use PoPCMSSchema\CustomPosts\Component;
use PoPCMSSchema\CustomPosts\ComponentConfiguration;
use PoPCMSSchema\CustomPosts\FilterInputProcessors\FilterInputProcessor;
use PoPCMSSchema\CustomPosts\TypeResolvers\EnumType\CustomPostEnumTypeResolver;
use PoPCMSSchema\CustomPosts\TypeResolvers\EnumType\FilterCustomPostStatusEnumTypeResolver;
use PoPCMSSchema\CustomPosts\Enums\CustomPostStatus;
use PoPCMSSchema\SchemaCommons\FilterInputProcessors\FilterInputProcessor as SchemaCommonsFilterInputProcessor;
use PoPCMSSchema\SchemaCommons\TypeResolvers\InputObjectType\AbstractObjectsFilterInputObjectTypeResolver;
use PoPCMSSchema\SchemaCommons\TypeResolvers\InputObjectType\DateQueryInputObjectTypeResolver;

abstract class AbstractCustomPostsFilterInputObjectTypeResolver extends AbstractObjectsFilterInputObjectTypeResolver
{
    private ?DateQueryInputObjectTypeResolver $dateQueryInputObjectTypeResolver = null;
    private ?FilterCustomPostStatusEnumTypeResolver $filterCustomPostStatusEnumTypeResolver = null;
    private ?CustomPostEnumTypeResolver $customPostEnumTypeResolver = null;
    private ?StringScalarTypeResolver $stringScalarTypeResolver = null;

    final public function setDateQueryInputObjectTypeResolver(DateQueryInputObjectTypeResolver $dateQueryInputObjectTypeResolver): void
    {
        $this->dateQueryInputObjectTypeResolver = $dateQueryInputObjectTypeResolver;
    }
    final protected function getDateQueryInputObjectTypeResolver(): DateQueryInputObjectTypeResolver
    {
        return $this->dateQueryInputObjectTypeResolver ??= $this->instanceManager->getInstance(DateQueryInputObjectTypeResolver::class);
    }
    final public function setFilterCustomPostStatusEnumTypeResolver(FilterCustomPostStatusEnumTypeResolver $filterCustomPostStatusEnumTypeResolver): void
    {
        $this->filterCustomPostStatusEnumTypeResolver = $filterCustomPostStatusEnumTypeResolver;
    }
    final protected function getFilterCustomPostStatusEnumTypeResolver(): FilterCustomPostStatusEnumTypeResolver
    {
        return $this->filterCustomPostStatusEnumTypeResolver ??= $this->instanceManager->getInstance(FilterCustomPostStatusEnumTypeResolver::class);
    }
    final public function setCustomPostEnumTypeResolver(CustomPostEnumTypeResolver $customPostEnumTypeResolver): void
    {
        $this->customPostEnumTypeResolver = $customPostEnumTypeResolver;
    }
    final protected function getCustomPostEnumTypeResolver(): CustomPostEnumTypeResolver
    {
        return $this->customPostEnumTypeResolver ??= $this->instanceManager->getInstance(CustomPostEnumTypeResolver::class);
    }
    final public function setStringScalarTypeResolver(StringScalarTypeResolver $stringScalarTypeResolver): void
    {
        $this->stringScalarTypeResolver = $stringScalarTypeResolver;
    }
    final protected function getStringScalarTypeResolver(): StringScalarTypeResolver
    {
        return $this->stringScalarTypeResolver ??= $this->instanceManager->getInstance(StringScalarTypeResolver::class);
    }

    public function getAdminInputFieldNames(): array
    {
        $adminInputFieldNames = parent::getAdminInputFieldNames();
        if ($this->treatCustomPostStatusAsAdminData()) {
            $adminInputFieldNames[] = 'status';
        }
        return $adminInputFieldNames;
    }

    protected function treatCustomPostStatusAsAdminData(): bool
    {
        /** @var ComponentConfiguration */
        $componentConfiguration = App::getComponent(Component::class)->getConfiguration();
        return $componentConfiguration->treatCustomPostStatusAsAdminData();
    }

    protected function addCustomPostInputFields(): bool
    {
        return false;
    }

    public function getInputFieldNameTypeResolvers(): array
    {
        return array_merge(
            parent::getInputFieldNameTypeResolvers(),
            [
                'status' => $this->getFilterCustomPostStatusEnumTypeResolver(),
                'search' => $this->getStringScalarTypeResolver(),
                'dateQuery' => $this->getDateQueryInputObjectTypeResolver(),
            ],
            $this->addCustomPostInputFields() ? [
                'customPostTypes' => $this->getCustomPostEnumTypeResolver(),
            ] : []
        );
    }

    public function getInputFieldDescription(string $inputFieldName): ?string
    {
        return match ($inputFieldName) {
            'status' => $this->__('Custom post status', 'customposts'),
            'search' => $this->__('Search for custom posts containing the given string', 'customposts'),
            'dateQuery' => $this->__('Filter custom posts based on date', 'customposts'),
            'customPostTypes' => $this->__('Filter custom posts of given types', 'customposts'),
            default => parent::getInputFieldDescription($inputFieldName),
        };
    }

    public function getInputFieldDefaultValue(string $inputFieldName): mixed
    {
        return match ($inputFieldName) {
            'status' => [
                CustomPostStatus::PUBLISH,
            ],
            'customPostTypes' => $this->getCustomPostEnumTypeResolver()->getConsolidatedEnumValues(),
            default => parent::getInputFieldDefaultValue($inputFieldName)
        };
    }

    public function getInputFieldTypeModifiers(string $inputFieldName): int
    {
        return match ($inputFieldName) {
            'status',
            'customPostTypes'
                => SchemaTypeModifiers::IS_ARRAY | SchemaTypeModifiers::IS_NON_NULLABLE_ITEMS_IN_ARRAY,
            default
                => parent::getInputFieldTypeModifiers($inputFieldName)
        };
    }

    public function getInputFieldFilterInput(string $inputFieldName): ?array
    {
        return match ($inputFieldName) {
            'status' => [FilterInputProcessor::class, FilterInputProcessor::FILTERINPUT_CUSTOMPOSTSTATUS],
            'search' => [SchemaCommonsFilterInputProcessor::class, SchemaCommonsFilterInputProcessor::FILTERINPUT_SEARCH],
            'customPostTypes' => [FilterInputProcessor::class, FilterInputProcessor::FILTERINPUT_UNIONCUSTOMPOSTTYPES],
            default => parent::getInputFieldFilterInput($inputFieldName),
        };
    }
}
