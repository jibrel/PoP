<?php

declare(strict_types=1);

namespace PoPSchema\Highlights\FieldResolvers\ObjectType;

use PoP\ComponentModel\FieldResolvers\ObjectType\AbstractObjectTypeFieldResolver;
use PoP\ComponentModel\Misc\GeneralUtils;
use PoP\ComponentModel\Schema\SchemaTypeModifiers;
use PoP\ComponentModel\TypeResolvers\ConcreteTypeResolverInterface;
use PoP\ComponentModel\TypeResolvers\ObjectType\ObjectTypeResolverInterface;
use PoP\Engine\TypeResolvers\ScalarType\BooleanScalarTypeResolver;
use PoP\Engine\TypeResolvers\ScalarType\IntScalarTypeResolver;
use PoPSchema\CustomPostMeta\Utils;
use PoPSchema\CustomPosts\Facades\CustomPostTypeAPIFacade;
use PoPSchema\CustomPosts\TypeResolvers\ObjectType\AbstractCustomPostObjectTypeResolver;
use PoPSchema\Highlights\TypeResolvers\ObjectType\HighlightObjectTypeResolver;
use PoPSchema\SchemaCommons\Constants\QueryOptions;
use PoPSchema\SchemaCommons\DataLoading\ReturnTypes;
use Symfony\Contracts\Service\Attribute\Required;

class CustomPostObjectTypeFieldResolver extends AbstractObjectTypeFieldResolver
{
    protected BooleanScalarTypeResolver $booleanScalarTypeResolver;
    protected IntScalarTypeResolver $intScalarTypeResolver;
    protected HighlightObjectTypeResolver $highlightObjectTypeResolver;
    
    #[Required]
    public function autowireCustomPostObjectTypeFieldResolver(
        BooleanScalarTypeResolver $booleanScalarTypeResolver,
        IntScalarTypeResolver $intScalarTypeResolver,
        HighlightObjectTypeResolver $highlightObjectTypeResolver,
    ): void {
        $this->booleanScalarTypeResolver = $booleanScalarTypeResolver;
        $this->intScalarTypeResolver = $intScalarTypeResolver;
        $this->highlightObjectTypeResolver = $highlightObjectTypeResolver;
    }

    public function getObjectTypeResolverClassesToAttachTo(): array
    {
        return [
            AbstractCustomPostObjectTypeResolver::class,
        ];
    }

    public function getFieldNamesToResolve(): array
    {
        return [
            'highlights',
            'hasHighlights',
            'highlightsCount',
        ];
    }

    public function getFieldTypeResolver(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ConcreteTypeResolverInterface
    {
        return match($fieldName) {
            'hasHighlights' => $this->booleanScalarTypeResolver,
            'highlightsCount' => $this->intScalarTypeResolver,
            'highlights' => $this->highlightObjectTypeResolver,
            default => parent::getFieldTypeResolver($objectTypeResolver, $fieldName),
        };
    }

    public function getSchemaFieldTypeModifiers(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ?int
    {
        return match ($fieldName) {
            'hasHighlights',
            'highlightsCount'
                => SchemaTypeModifiers::NON_NULLABLE,
            'highlights'
                => SchemaTypeModifiers::NON_NULLABLE | SchemaTypeModifiers::IS_ARRAY,
            default
                => parent::getSchemaFieldTypeModifiers($objectTypeResolver, $fieldName),
        };
    }

    public function getSchemaFieldDescription(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ?string
    {
        $descriptions = [
            'highlights' => $this->translationAPI->__('', ''),
            'hasHighlights' => $this->translationAPI->__('', ''),
            'highlightsCount' => $this->translationAPI->__('', ''),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($objectTypeResolver, $fieldName);
    }

    /**
     * @param array<string, mixed> $fieldArgs
     * @param array<string, mixed>|null $variables
     * @param array<string, mixed>|null $expressions
     * @param array<string, mixed> $options
     */
    public function resolveValue(
        ObjectTypeResolverInterface $objectTypeResolver,
        object $object,
        string $fieldName,
        array $fieldArgs = [],
        ?array $variables = null,
        ?array $expressions = null,
        array $options = []
    ): mixed {
        $customPost = $object;
        $customPostTypeAPI = CustomPostTypeAPIFacade::getInstance();
        switch ($fieldName) {
            case 'highlights':
                $query = array(
                    // 'fields' => 'ids',
                    'limit' => -1, // Bring all the results
                    'meta-query' => [
                        [
                            'key' => Utils::getMetaKey(GD_METAKEY_POST_HIGHLIGHTEDPOST),
                            'value' => $objectTypeResolver->getID($customPost),
                        ],
                    ],
                    'custompost-types' => [POP_ADDHIGHLIGHTS_POSTTYPE_HIGHLIGHT],
                    'orderby' => $this->nameResolver->getName('popcms:dbcolumn:orderby:customposts:date'),
                    'order' => 'ASC',
                );

                return $customPostTypeAPI->getCustomPosts($query, [QueryOptions::RETURN_TYPE => ReturnTypes::IDS]);

            case 'hasHighlights':
                $referencedbyCount = $objectTypeResolver->resolveValue($object, 'highlightsCount', $variables, $expressions, $options);
                if (GeneralUtils::isError($referencedbyCount)) {
                    return $referencedbyCount;
                }
                return $referencedbyCount > 0;

            case 'highlightsCount':
                $referencedby = $objectTypeResolver->resolveValue($object, 'highlights', $variables, $expressions, $options);
                if (GeneralUtils::isError($referencedby)) {
                    return $referencedby;
                }
                return count($referencedby);
        }

        return parent::resolveValue($objectTypeResolver, $object, $fieldName, $fieldArgs, $variables, $expressions, $options);
    }
}
