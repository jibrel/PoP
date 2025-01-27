<?php

declare(strict_types=1);

namespace PoPCMSSchema\UserRolesWP\RelationalTypeDataLoaders\ObjectType;

use PoP\ComponentModel\RelationalTypeDataLoaders\ObjectType\AbstractObjectTypeDataLoader;

use function get_role;

class UserRoleTypeDataLoader extends AbstractObjectTypeDataLoader
{
    public function getObjects(array $ids): array
    {
        return array_map(get_role(...), $ids);
    }
}
