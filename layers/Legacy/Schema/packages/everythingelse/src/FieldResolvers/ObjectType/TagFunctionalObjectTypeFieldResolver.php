<?php

declare(strict_types=1);

namespace PoPSchema\EverythingElse\FieldResolvers\ObjectType;

use PoP\ApplicationTaxonomies\FunctionAPIFactory;
use PoP\ComponentModel\FieldResolvers\ObjectType\AbstractObjectTypeFieldResolver;
use PoP\ComponentModel\TypeResolvers\ConcreteTypeResolverInterface;
use PoP\ComponentModel\TypeResolvers\ObjectType\ObjectTypeResolverInterface;
use PoP\Engine\TypeResolvers\ScalarType\StringScalarTypeResolver;
use PoPSchema\EverythingElse\Misc\TagHelpers;
use PoPSchema\Tags\TypeResolvers\ObjectType\AbstractTagObjectTypeResolver;
use Symfony\Contracts\Service\Attribute\Required;

class TagFunctionalObjectTypeFieldResolver extends AbstractObjectTypeFieldResolver
{
    protected StringScalarTypeResolver $stringScalarTypeResolver;
    
    #[Required]
    public function autowireTagFunctionalObjectTypeFieldResolver(
        StringScalarTypeResolver $stringScalarTypeResolver,
    ): void {
        $this->stringScalarTypeResolver = $stringScalarTypeResolver;
    }

    public function getObjectTypeResolverClassesToAttachTo(): array
    {
        return [
            AbstractTagObjectTypeResolver::class,
        ];
    }

    public function getFieldNamesToResolve(): array
    {
        return [
            'symbol',
            'symbolnamedescription',
            'namedescription',
            'symbolname',
        ];
    }

    public function getFieldTypeResolver(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ConcreteTypeResolverInterface
    {
        $types = [
            'symbol' => $this->stringScalarTypeResolver,
            'symbolnamedescription' => $this->stringScalarTypeResolver,
            'namedescription' => $this->stringScalarTypeResolver,
            'symbolname' => $this->stringScalarTypeResolver,
        ];
        return $types[$fieldName] ?? parent::getFieldTypeResolver($objectTypeResolver, $fieldName);
    }

    public function getSchemaFieldDescription(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ?string
    {
        $descriptions = [
            'symbol' => $this->translationAPI->__('Tag symbol', 'pop-everythingelse'),
            'symbolnamedescription' => $this->translationAPI->__('Tag symbol and description', 'pop-everythingelse'),
            'namedescription' => $this->translationAPI->__('Tag and description', 'pop-everythingelse'),
            'symbolname' => $this->translationAPI->__('Symbol and tag', 'pop-everythingelse'),
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
        $applicationtaxonomyapi = FunctionAPIFactory::getInstance();
        $tag = $object;
        switch ($fieldName) {
            case 'symbol':
                return TagHelpers::getTagSymbol();

            case 'symbolnamedescription':
                return TagHelpers::getTagSymbolNameDescription($tag);

            case 'namedescription':
                return TagHelpers::getTagNameDescription($tag);

            case 'symbolname':
                return $applicationtaxonomyapi->getTagSymbolName($tag);
        }

        return parent::resolveValue($objectTypeResolver, $object, $fieldName, $fieldArgs, $variables, $expressions, $options);
    }
}
