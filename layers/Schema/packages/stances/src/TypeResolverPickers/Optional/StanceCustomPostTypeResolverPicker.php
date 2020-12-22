<?php

declare(strict_types=1);

namespace PoPSchema\Stances\TypeResolverPickers\Optional;

use PoPSchema\CustomPosts\TypeResolvers\CustomPostUnionTypeResolver;
use PoPSchema\Stances\TypeResolverPickers\AbstractStanceTypeResolverPicker;

class StanceCustomPostTypeResolverPicker extends AbstractStanceTypeResolverPicker
{
    public static function getClassesToAttachTo(): array
    {
        return [
            CustomPostUnionTypeResolver::class,
        ];
    }
}
