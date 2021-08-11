<?php

declare(strict_types=1);

namespace PoPWPSchema\Users\FieldResolvers;

use PoP\ComponentModel\FieldResolvers\AbstractDBDataFieldResolver;
use PoP\ComponentModel\Schema\SchemaDefinition;
use PoP\ComponentModel\Schema\SchemaTypeModifiers;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;
use PoPSchema\Users\TypeResolvers\UserTypeResolver;
use WP_User;

class UserFieldResolver extends AbstractDBDataFieldResolver
{
    public function getClassesToAttachTo(): array
    {
        return array(UserTypeResolver::class);
    }

    public function getFieldNamesToResolve(): array
    {
        return [
            'nicename',
        ];
    }

    public function getSchemaFieldType(TypeResolverInterface $typeResolver, string $fieldName): string
    {
        return match ($fieldName) {
            'nicename' => SchemaDefinition::TYPE_STRING,
            default => parent::getSchemaFieldType($typeResolver, $fieldName),
        };
    }

    public function getSchemaFieldTypeModifiers(TypeResolverInterface $typeResolver, string $fieldName): ?int
    {
        return match ($fieldName) {
            'nicename'
                => SchemaTypeModifiers::NON_NULLABLE,
            default
                => parent::getSchemaFieldTypeModifiers($typeResolver, $fieldName),
        };
    }

    public function getSchemaFieldDescription(TypeResolverInterface $typeResolver, string $fieldName): ?string
    {
        return match ($fieldName) {
            'nicename' => $this->translationAPI->__('User\'s nicename', 'pop-users'),
            default => parent::getSchemaFieldDescription($typeResolver, $fieldName),
        };
    }

    /**
     * @param array<string, mixed> $fieldArgs
     * @param array<string, mixed>|null $variables
     * @param array<string, mixed>|null $expressions
     * @param array<string, mixed> $options
     */
    public function resolveValue(
        TypeResolverInterface $typeResolver,
        object $resultItem,
        string $fieldName,
        array $fieldArgs = [],
        ?array $variables = null,
        ?array $expressions = null,
        array $options = []
    ): mixed {
        /** @var WP_User */
        $user = $resultItem;
        switch ($fieldName) {
            case 'nicename':
                return $user->user_nicename;
        }

        return parent::resolveValue($typeResolver, $resultItem, $fieldName, $fieldArgs, $variables, $expressions, $options);
    }
}