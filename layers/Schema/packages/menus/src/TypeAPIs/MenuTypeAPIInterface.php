<?php

declare(strict_types=1);

namespace PoPSchema\Menus\TypeAPIs;

/**
 * Methods to interact with the Type, to be implemented by the underlying CMS
 */
interface MenuTypeAPIInterface
{
    public function getMenu(string | int $menuID): ?object;
    public function getMenuItemsData(string | int | object $menuObjectOrID): array;
    public function getMenuID(object $menu): string | int;
    public function getMenuIDFromMenuName(string $menuName): string | int | null;
    /**
     * @return array<string|int>
     */
    public function getMenuIDs(): array;
}
