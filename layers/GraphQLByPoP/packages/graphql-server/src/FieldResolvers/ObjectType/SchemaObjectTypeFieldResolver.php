<?php

declare(strict_types=1);

namespace GraphQLByPoP\GraphQLServer\FieldResolvers\ObjectType;

use GraphQLByPoP\GraphQLServer\ObjectModels\Schema;
use GraphQLByPoP\GraphQLServer\TypeResolvers\ObjectType\DirectiveObjectTypeResolver;
use GraphQLByPoP\GraphQLServer\TypeResolvers\ObjectType\SchemaObjectTypeResolver;
use GraphQLByPoP\GraphQLServer\TypeResolvers\ObjectType\TypeObjectTypeResolver;
use PoP\ComponentModel\FieldResolvers\ObjectType\AbstractObjectTypeFieldResolver;
use PoP\ComponentModel\Schema\SchemaTypeModifiers;
use PoP\ComponentModel\TypeResolvers\ConcreteTypeResolverInterface;
use PoP\ComponentModel\TypeResolvers\ObjectType\ObjectTypeResolverInterface;
use PoP\Engine\TypeResolvers\ScalarType\StringScalarTypeResolver;
use Symfony\Contracts\Service\Attribute\Required;

class SchemaObjectTypeFieldResolver extends AbstractObjectTypeFieldResolver
{
    protected TypeObjectTypeResolver $typeObjectTypeResolver;
    protected DirectiveObjectTypeResolver $directiveObjectTypeResolver;
    protected StringScalarTypeResolver $stringScalarTypeResolver;

    #[Required]
    public function autowireSchemaObjectTypeFieldResolver(
        TypeObjectTypeResolver $typeObjectTypeResolver,
        DirectiveObjectTypeResolver $directiveObjectTypeResolver,
        StringScalarTypeResolver $stringScalarTypeResolver,
    ): void {
        $this->typeObjectTypeResolver = $typeObjectTypeResolver;
        $this->directiveObjectTypeResolver = $directiveObjectTypeResolver;
        $this->stringScalarTypeResolver = $stringScalarTypeResolver;
    }

    public function getObjectTypeResolverClassesToAttachTo(): array
    {
        return [
            SchemaObjectTypeResolver::class,
        ];
    }

    public function getFieldNamesToResolve(): array
    {
        return [
            'queryType',
            'mutationType',
            'subscriptionType',
            'types',
            'directives',
            'type',
        ];
    }

    public function getSchemaFieldTypeModifiers(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ?int
    {
        return match ($fieldName) {
            'queryType'
                => SchemaTypeModifiers::NON_NULLABLE,
            'types',
            'directives'
                => SchemaTypeModifiers::NON_NULLABLE | SchemaTypeModifiers::IS_ARRAY,
            default
                => parent::getSchemaFieldTypeModifiers($objectTypeResolver, $fieldName),
        };
    }

    public function getSchemaFieldDescription(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ?string
    {
        return match ($fieldName) {
            'queryType' => $this->translationAPI->__('The type, accessible from the root, that resolves queries', 'graphql-server'),
            'mutationType' => $this->translationAPI->__('The type, accessible from the root, that resolves mutations', 'graphql-server'),
            'subscriptionType' => $this->translationAPI->__('The type, accessible from the root, that resolves subscriptions', 'graphql-server'),
            'types' => $this->translationAPI->__('All types registered in the data graph', 'graphql-server'),
            'directives' => $this->translationAPI->__('All directives registered in the data graph', 'graphql-server'),
            'type' => $this->translationAPI->__('Obtain a specific type from the schema', 'graphql-server'),
            default => parent::getSchemaFieldDescription($objectTypeResolver, $fieldName),
        };
    }

    public function getFieldArgNameResolvers(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): array
    {
        return match ($fieldName) {
            'type' => [
                'name' => $this->stringScalarTypeResolver,
            ],
            default => parent::getFieldArgNameResolvers($objectTypeResolver, $fieldName),
        };
    }
    
    public function getFieldArgDescription(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName, string $fieldArgName): ?string
    {
        return match ([$fieldName => $fieldArgName]) {
            ['type' => 'name'] => $this->translationAPI->__('The name of the type', 'graphql-server'),
            default => parent::getFieldArgDescription($objectTypeResolver, $fieldName, $fieldArgName),
        };
    }
    
    public function getFieldArgTypeModifiers(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName, string $fieldArgName): int
    {
        return match ([$fieldName => $fieldArgName]) {
            ['type' => 'name'] => SchemaTypeModifiers::MANDATORY,
            default => parent::getFieldArgTypeModifiers($objectTypeResolver, $fieldName, $fieldArgName),
        };
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
        /** @var Schema */
        $schema = $object;
        switch ($fieldName) {
            case 'queryType':
                return $schema->getQueryTypeID();
            case 'mutationType':
                return $schema->getMutationTypeID();
            case 'subscriptionType':
                return $schema->getSubscriptionTypeID();
            case 'types':
                return $schema->getTypeIDs();
            case 'directives':
                return $schema->getDirectiveIDs();
            case 'type':
                return $schema->getTypeID($fieldArgs['name']);
        }

        return parent::resolveValue($objectTypeResolver, $object, $fieldName, $fieldArgs, $variables, $expressions, $options);
    }

    public function getFieldTypeResolver(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ConcreteTypeResolverInterface
    {
        switch ($fieldName) {
            case 'queryType':
            case 'mutationType':
            case 'subscriptionType':
            case 'types':
            case 'type':
                return $this->typeObjectTypeResolver;
            case 'directives':
                return $this->directiveObjectTypeResolver;
        }

        return parent::getFieldTypeResolver($objectTypeResolver, $fieldName);
    }
}
