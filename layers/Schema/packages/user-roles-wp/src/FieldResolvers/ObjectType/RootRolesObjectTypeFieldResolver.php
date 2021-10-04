<?php

declare(strict_types=1);

namespace PoPSchema\UserRolesWP\FieldResolvers\ObjectType;

use PoP\ComponentModel\FieldResolvers\ObjectType\AbstractObjectTypeFieldResolver;
use PoP\ComponentModel\Schema\SchemaTypeModifiers;
use PoP\ComponentModel\TypeResolvers\ConcreteTypeResolverInterface;
use PoP\ComponentModel\TypeResolvers\ObjectType\ObjectTypeResolverInterface;
use PoP\Engine\TypeResolvers\ObjectType\RootObjectTypeResolver;
use PoP\Engine\TypeResolvers\ScalarType\StringScalarTypeResolver;
use PoPSchema\UserRoles\FieldResolvers\ObjectType\RolesObjectTypeFieldResolverTrait;
use PoPSchema\UserRoles\TypeAPIs\UserRoleTypeAPIInterface;
use Symfony\Contracts\Service\Attribute\Required;

class RootRolesObjectTypeFieldResolver extends AbstractObjectTypeFieldResolver
{
    use RolesObjectTypeFieldResolverTrait;

    protected StringScalarTypeResolver $stringScalarTypeResolver;
    protected UserRoleTypeAPIInterface $userRoleTypeAPI;

    #[Required]
    final public function autowireRootRolesObjectTypeFieldResolver(
        StringScalarTypeResolver $stringScalarTypeResolver,
        UserRoleTypeAPIInterface $userRoleTypeAPI,
    ): void {
        $this->stringScalarTypeResolver = $stringScalarTypeResolver;
        $this->userRoleTypeAPI = $userRoleTypeAPI;
    }

    public function getObjectTypeResolverClassesToAttachTo(): array
    {
        return [
            RootObjectTypeResolver::class,
        ];
    }

    public function getFieldNamesToResolve(): array
    {
        return [
            'roleNames',
        ];
    }

    public function getAdminFieldNames(): array
    {
        return [
            'roleNames',
        ];
    }

    public function getFieldTypeResolver(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ConcreteTypeResolverInterface
    {
        return match ($fieldName) {
            'roleNames' => $this->stringScalarTypeResolver,
            default => parent::getFieldTypeResolver($objectTypeResolver, $fieldName),
        };
    }

    public function getFieldDescription(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ?string
    {
        return match ($fieldName) {
            'roleNames' => $this->translationAPI->__('All user role names', 'user-roles'),
            default => parent::getFieldDescription($objectTypeResolver, $fieldName),
        };
    }

    public function getFieldTypeModifiers(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): int
    {
        return match ($fieldName) {
            'roleNames'
                => SchemaTypeModifiers::NON_NULLABLE
                | SchemaTypeModifiers::IS_ARRAY
                | SchemaTypeModifiers::IS_NON_NULLABLE_ITEMS_IN_ARRAY,
            default
                => parent::getFieldTypeModifiers($objectTypeResolver, $fieldName),
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
        switch ($fieldName) {
            case 'roleNames':
                return $this->userRoleTypeAPI->getRoleNames();
        }

        return parent::resolveValue($objectTypeResolver, $object, $fieldName, $fieldArgs, $variables, $expressions, $options);
    }
}
