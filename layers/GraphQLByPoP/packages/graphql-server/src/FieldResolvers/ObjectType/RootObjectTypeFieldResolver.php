<?php

declare(strict_types=1);

namespace GraphQLByPoP\GraphQLServer\FieldResolvers\ObjectType;

use GraphQLByPoP\GraphQLServer\RelationalTypeDataLoaders\ObjectType\SchemaTypeDataLoader;
use GraphQLByPoP\GraphQLServer\TypeResolvers\ObjectType\SchemaObjectTypeResolver;
use GraphQLByPoP\GraphQLServer\TypeResolvers\ObjectType\TypeObjectTypeResolver;
use PoP\ComponentModel\FieldResolvers\ObjectType\AbstractObjectTypeFieldResolver;
use PoP\ComponentModel\Misc\GeneralUtils;
use PoP\ComponentModel\Schema\SchemaTypeModifiers;
use PoP\ComponentModel\State\ApplicationState;
use PoP\ComponentModel\TypeResolvers\ConcreteTypeResolverInterface;
use PoP\ComponentModel\TypeResolvers\ObjectType\ObjectTypeResolverInterface;
use PoP\Engine\TypeResolvers\ObjectType\RootObjectTypeResolver;
use PoP\Engine\TypeResolvers\ScalarType\StringScalarTypeResolver;
use Symfony\Contracts\Service\Attribute\Required;

class RootObjectTypeFieldResolver extends AbstractObjectTypeFieldResolver
{
    protected SchemaObjectTypeResolver $schemaObjectTypeResolver;
    protected TypeObjectTypeResolver $typeObjectTypeResolver;
    protected SchemaTypeDataLoader $schemaTypeDataLoader;
    protected StringScalarTypeResolver $stringScalarTypeResolver;

    #[Required]
    public function autowireRootObjectTypeFieldResolver(
        SchemaObjectTypeResolver $schemaObjectTypeResolver,
        TypeObjectTypeResolver $typeObjectTypeResolver,
        SchemaTypeDataLoader $schemaTypeDataLoader,
        StringScalarTypeResolver $stringScalarTypeResolver,
    ): void {
        $this->schemaObjectTypeResolver = $schemaObjectTypeResolver;
        $this->typeObjectTypeResolver = $typeObjectTypeResolver;
        $this->schemaTypeDataLoader = $schemaTypeDataLoader;
        $this->stringScalarTypeResolver = $stringScalarTypeResolver;
    }

    public function getObjectTypeResolverClassesToAttachTo(): array
    {
        return [
            RootObjectTypeResolver::class,
        ];
    }

    public function getFieldNamesToResolve(): array
    {
        // Only register them for the standard GraphQL,
        // or for PQL if explicitly enabled
        $vars = ApplicationState::getVars();
        if (!$vars['graphql-introspection-enabled']) {
            return [];
        }
        return [
            '__schema',
            '__type',
        ];
    }

    public function getSchemaFieldTypeModifiers(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ?int
    {
        return match ($fieldName) {
            '__schema',
            '__type'
                => SchemaTypeModifiers::NON_NULLABLE,
            default
                => parent::getSchemaFieldTypeModifiers($objectTypeResolver, $fieldName),
        };
    }

    public function getSchemaFieldDescription(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ?string
    {
        return match ($fieldName) {
            '__schema' => $this->translationAPI->__('The GraphQL schema, exposing what fields can be queried', 'graphql-server'),
            '__type' => $this->translationAPI->__('Obtain a specific type from the schema', 'graphql-server'),
            default => parent::getSchemaFieldDescription($objectTypeResolver, $fieldName),
        };
    }

    public function getFieldArgNameResolvers(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): array
    {
        return match ($fieldName) {
            '__type' => [
                'name' => $this->stringScalarTypeResolver,
            ],
            default => parent::getFieldArgNameResolvers($objectTypeResolver, $fieldName),
        };
    }
    
    public function getFieldArgDescription(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName, string $fieldArgName): ?string
    {
        return match ([$fieldName => $fieldArgName]) {
            ['__type' => 'name'] => $this->translationAPI->__('The name of the type', 'graphql-server'),
            default => parent::getFieldArgDescription($objectTypeResolver, $fieldName, $fieldArgName),
        };
    }
    
    public function getFieldArgTypeModifiers(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName, string $fieldArgName): int
    {
        return match ([$fieldName => $fieldArgName]) {
            ['__type' => 'name'] => SchemaTypeModifiers::MANDATORY,
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
        $root = $object;
        switch ($fieldName) {
            case '__schema':
                return 'schema';
            case '__type':
                // Get an instance of the schema and then execute function `getType` there
                $schemaID = $objectTypeResolver->resolveValue(
                    $object,
                    $this->fieldQueryInterpreter->getField(
                        '__schema',
                        []
                    ),
                    $variables,
                    $expressions,
                    $options
                );
                if (GeneralUtils::isError($schemaID)) {
                    return $schemaID;
                }
                // Obtain the instance of the schema
                $schemaInstances = $this->schemaTypeDataLoader->getObjects([$schemaID]);
                $schema = $schemaInstances[0];
                return $schema->getTypeID($fieldArgs['name']);
        }

        return parent::resolveValue($objectTypeResolver, $object, $fieldName, $fieldArgs, $variables, $expressions, $options);
    }

    public function getFieldTypeResolver(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ConcreteTypeResolverInterface
    {
        switch ($fieldName) {
            case '__schema':
                return $this->schemaObjectTypeResolver;
            case '__type':
                return $this->typeObjectTypeResolver;
        }

        return parent::getFieldTypeResolver($objectTypeResolver, $fieldName);
    }
}
