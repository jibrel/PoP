<?php

declare(strict_types=1);

namespace PoPSchema\Comments\FieldResolvers\InterfaceType;

use PoP\ComponentModel\FieldResolvers\InterfaceType\AbstractQueryableSchemaInterfaceTypeFieldResolver;
use PoP\ComponentModel\FilterInput\FilterInputHelper;
use PoP\ComponentModel\Instances\InstanceManagerInterface;
use PoP\ComponentModel\Registries\TypeRegistryInterface;
use PoP\ComponentModel\Schema\SchemaNamespacingServiceInterface;
use PoP\ComponentModel\Schema\SchemaTypeModifiers;
use PoP\ComponentModel\TypeResolvers\ConcreteTypeResolverInterface;
use PoP\Engine\CMS\CMSServiceInterface;
use PoP\Engine\TypeResolvers\ScalarType\BooleanScalarTypeResolver;
use PoP\Engine\TypeResolvers\ScalarType\IntScalarTypeResolver;
use PoP\Hooks\HooksAPIInterface;
use PoP\LooseContracts\NameResolverInterface;
use PoP\Translation\TranslationAPIInterface;
use PoPSchema\Comments\ComponentConfiguration;
use PoPSchema\Comments\ModuleProcessors\CommentFilterInputContainerModuleProcessor;
use PoPSchema\Comments\TypeResolvers\InterfaceType\CommentableInterfaceTypeResolver;
use PoPSchema\Comments\TypeResolvers\ObjectType\CommentObjectTypeResolver;
use PoPSchema\SchemaCommons\FormInputs\OrderFormInput;
use PoPSchema\SchemaCommons\ModuleProcessors\FormInputs\CommonFilterInputModuleProcessor;
use PoPSchema\SchemaCommons\Resolvers\WithLimitFieldArgResolverTrait;

class CommentableInterfaceTypeFieldResolver extends AbstractQueryableSchemaInterfaceTypeFieldResolver
{
    use WithLimitFieldArgResolverTrait;

    public function __construct(
        TranslationAPIInterface $translationAPI,
        HooksAPIInterface $hooksAPI,
        InstanceManagerInterface $instanceManager,
        NameResolverInterface $nameResolver,
        CMSServiceInterface $cmsService,
        SchemaNamespacingServiceInterface $schemaNamespacingService,
        TypeRegistryInterface $typeRegistry,
        protected BooleanScalarTypeResolver $booleanScalarTypeResolver,
        protected IntScalarTypeResolver $intScalarTypeResolver,
        protected CommentObjectTypeResolver $commentObjectTypeResolver,
    ) {
        parent::__construct(
            $translationAPI,
            $hooksAPI,
            $instanceManager,
            $nameResolver,
            $cmsService,
            $schemaNamespacingService,
            $typeRegistry,
        );
    }

    public function getInterfaceTypeResolverClassesToAttachTo(): array
    {
        return [
            CommentableInterfaceTypeResolver::class,
        ];
    }

    public function getFieldNamesToImplement(): array
    {
        return [
            'areCommentsOpen',
            'hasComments',
            'commentCount',
            'comments',
            'commentCountForAdmin',
            'commentsForAdmin',
        ];
    }

    public function getFieldTypeResolver(string $fieldName): ConcreteTypeResolverInterface
    {
        $types = [
            'comments' => $this->commentObjectTypeResolver,
            'commentsForAdmin' => $this->commentObjectTypeResolver,
            'areCommentsOpen' => $this->booleanScalarTypeResolver,
            'hasComments' => $this->booleanScalarTypeResolver,
            'commentCount' => $this->intScalarTypeResolver,
            'commentCountForAdmin' => $this->intScalarTypeResolver,
        ];
        return $types[$fieldName] ?? parent::getFieldTypeResolver($fieldName);
    }

    public function getSchemaFieldTypeModifiers(string $fieldName): ?int
    {
        return match ($fieldName) {
            'areCommentsOpen',
            'hasComments',
            'commentCount',
            'commentCountForAdmin'
                => SchemaTypeModifiers::NON_NULLABLE,
            'comments',
            'commentsForAdmin'
                => SchemaTypeModifiers::NON_NULLABLE | SchemaTypeModifiers::IS_ARRAY,
            default
                => parent::getSchemaFieldTypeModifiers($fieldName),
        };
    }

    public function getSchemaFieldDescription(string $fieldName): ?string
    {
        $descriptions = [
            'areCommentsOpen' => $this->translationAPI->__('Are comments open to be added to the custom post', 'pop-comments'),
            'hasComments' => $this->translationAPI->__('Does the custom post have comments?', 'pop-comments'),
            'commentCount' => $this->translationAPI->__('Number of comments added to the custom post', 'pop-comments'),
            'comments' => $this->translationAPI->__('Comments added to the custom post', 'pop-comments'),
            'commentCountForAdmin' => $this->translationAPI->__('[Unrestricted] Number of comments added to the custom post', 'pop-comments'),
            'commentsForAdmin' => $this->translationAPI->__('[Unrestricted] Comments added to the custom post', 'pop-comments'),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($fieldName);
    }

    public function getFieldFilterInputContainerModule(string $fieldName): ?array
    {
        return match ($fieldName) {
            'comments' => [
                CommentFilterInputContainerModuleProcessor::class,
                CommentFilterInputContainerModuleProcessor::MODULE_FILTERINPUTCONTAINER_CUSTOMPOST_COMMENTS
            ],
            'commentCount' => [
                CommentFilterInputContainerModuleProcessor::class,
                CommentFilterInputContainerModuleProcessor::MODULE_FILTERINPUTCONTAINER_CUSTOMPOST_COMMENTCOUNT
            ],
            'commentsForAdmin' => [
                CommentFilterInputContainerModuleProcessor::class,
                CommentFilterInputContainerModuleProcessor::MODULE_FILTERINPUTCONTAINER_CUSTOMPOST_ADMINCOMMENTS
            ],
            'commentCountForAdmin' => [
                CommentFilterInputContainerModuleProcessor::class,
                CommentFilterInputContainerModuleProcessor::MODULE_FILTERINPUTCONTAINER_CUSTOMPOST_ADMINCOMMENTCOUNT
            ],
            default => parent::getFieldFilterInputContainerModule($fieldName),
        };
    }

    protected function getFieldFilterInputDefaultValues(string $fieldName): array
    {
        $parentIDFilterInputName = FilterInputHelper::getFilterInputName([
            CommonFilterInputModuleProcessor::class,
            CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_PARENT_ID
        ]);
        $filterInputNameDefaultValues = [
            // By default retrieve the top level comments (with ID => 0)
            $parentIDFilterInputName => 0,
        ];
        switch ($fieldName) {
            case 'comments':
            case 'commentsForAdmin':
                $limitFilterInputName = FilterInputHelper::getFilterInputName([
                    CommonFilterInputModuleProcessor::class,
                    CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_LIMIT
                ]);
                $orderFilterInputName = FilterInputHelper::getFilterInputName([
                    CommonFilterInputModuleProcessor::class,
                    CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_ORDER
                ]);
                // Order by descending date
                $orderBy = $this->nameResolver->getName('popcms:dbcolumn:orderby:comments:date');
                $order = 'DESC';
                return array_merge(
                    $filterInputNameDefaultValues,
                    [
                        $limitFilterInputName => ComponentConfiguration::getCustomPostCommentOrCommentResponseListDefaultLimit(),
                        $orderFilterInputName => $orderBy . OrderFormInput::SEPARATOR . $order,
                    ]
                );
            case 'commentCount':
            case 'commentCountForAdmin':
                return $filterInputNameDefaultValues;
        }
        return parent::getFieldFilterInputDefaultValues($fieldName);
    }

    /**
     * Validate the constraints for a field argument
     *
     * @return string[] Error messages
     */
    public function validateFieldArgument(
        string $fieldName,
        string $fieldArgName,
        mixed $fieldArgValue
    ): array {
        $errors = parent::validateFieldArgument(
            $fieldName,
            $fieldArgName,
            $fieldArgValue,
        );

        // Check the "limit" fieldArg
        switch ($fieldName) {
            case 'comments':
            case 'commentsForAdmin':
                if (
                    $maybeError = $this->maybeValidateLimitFieldArgument(
                        ComponentConfiguration::getCommentListMaxLimit(),
                        $fieldName,
                        $fieldArgName,
                        $fieldArgValue
                    )
                ) {
                    $errors[] = $maybeError;
                }
                break;
        }
        return $errors;
    }
}