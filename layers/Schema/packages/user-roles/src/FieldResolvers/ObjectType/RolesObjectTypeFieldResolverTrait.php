<?php

declare(strict_types=1);

namespace PoPSchema\UserRoles\FieldResolvers\ObjectType;

use PoP\ComponentModel\TypeResolvers\ConcreteTypeResolverInterface;
use PoP\Engine\TypeResolvers\ScalarType\StringScalarTypeResolver;
use PoP\ComponentModel\Schema\SchemaDefinition;
use PoP\ComponentModel\TypeResolvers\ObjectType\ObjectTypeResolverInterface;
use PoP\Translation\Facades\TranslationAPIFacade;

trait RolesObjectTypeFieldResolverTrait
{
    public function getFieldNamesToResolve(): array
    {
        return [
            'roles',
            'capabilities',
        ];
    }

    public function getAdminFieldNames(): array
    {
        return [
            'roles',
            'capabilities',
        ];
    }

    public function getFieldTypeResolver(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ConcreteTypeResolverInterface
    {
        $stringScalarTypeResolver = $this->instanceManager->getInstance(StringScalarTypeResolver::class);
        $types = [
            'roles' => $stringScalarTypeResolver,
            'capabilities' => $stringScalarTypeResolver,
        ];
        return $types[$fieldName] ?? parent::getFieldTypeResolver($objectTypeResolver, $fieldName);
    }

    public function getSchemaFieldDescription(ObjectTypeResolverInterface $objectTypeResolver, string $fieldName): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        $descriptions = [
            'roles' => $translationAPI->__('All user roles', 'user-roles'),
            'capabilities' => $translationAPI->__('All user capabilities', 'user-roles'),
        ];
        return $descriptions[$fieldName] ?? parent::getSchemaFieldDescription($objectTypeResolver, $fieldName);
    }
}