<?php

require '../dtos/menu-dto.php';
require '../repository/menu-repository.php';

class MenuService
{
    public static function fetchAll()
    {
        $menus = MenuRepository::fetchAll();
        $dtos = [];
        foreach ($menus as $menu) {
            $dtos[] = new MenuDTO($menu->getId(), $menu->getName(), $menu->getCreateDate(), $menu->getModifyDate(), $menu->getIdRestaurant());
        }
        return $dtos;
    }

    public static function fetchByRestaurantId($id)
    {
        $menus = MenuRepository::fetchByRestaurantId($id);
        $dtos = [];
        foreach ($menus as $menu) {
            $dtos[] = new MenuDTO($menu->getId(), $menu->getName(), $menu->getCreateDate(), $menu->getModifyDate(), $menu->getIdRestaurant());
        }
        return $dtos;
    }

    public static function add(MenuDTO $menu)
    {
        $menuEntity = new MenuEntity(NULL, $menu->getName(), $menu->getCreateDate(), $menu->getModifyDate(), $menu->getIdRestaurant());
        return MenuRepository::add($menuEntity);
    }

    public static function delete(MenuDTO $menu)
    {
        $menuEntity = new MenuEntity($menu->getId(), $menu->getName(), $menu->getCreateDate(), $menu->getModifyDate(), $menu->getIdRestaurant());
        return MenuRepository::delete($menuEntity);
    }

    public static function update(MenuDTO $menu)
    {
        $menuEntity = new MenuEntity($menu->getId(), $menu->getName(), $menu->getCreateDate(), $menu->getModifyDate(), $menu->getIdRestaurant());
        return MenuRepository::update($menuEntity);
    }
}
