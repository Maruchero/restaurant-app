<?php

require '../dtos/menu-dto.php';
require '../repository/menu-repository.php';

class MenuService {
    public static function fetchAll() {
        $menus = MenuRepository::fetchAll();
        $dtos = [];
        foreach ($menus as $menu) {
            $dtos[] = new MenuDTO($menu->getId(), $menu->getName(), $menu->getCreateDate(), $menu->getModifyDate(), $menu->getIdRestaurant());
        }
        return $dtos;
    }

    public static function fetchByRestaurantId($id) {
        $menus = MenuRepository::fetchByRestaurantId($id);
        $dtos = [];
        foreach ($menus as $menu) {
            $dtos[] = new MenuDTO($menu->getId(), $menu->getName(), $menu->getCreateDate(), $menu->getModifyDate(), $menu->getIdRestaurant());
        }
        return $dtos;
    }

    public static function add(MenuDTO $menu): void {
        $menuEntity = new MenuEntity($menu->getName(), $menu->getCreateDate(), $menu->getModifyDate(), $menu->getIdRestaurant());
        MenuRepository::add($menuEntity);
    }

    public static function delete(MenuDTO $menu): void {
        $menuEntity = new MenuEntity($menu->getId(), $menu->getName(), $menu->getCreateDate(), $menu->getModifyDate(), $menu->getIdRestaurant());
        MenuRepository::delete($menuEntity);
    }

    public static function update(MenuDTO $menu): void {
        $menuEntity = new MenuEntity($menu->getId(), $menu->getName(), $menu->getCreateDate(), $menu->getModifyDate(), $menu->getIdRestaurant());
        MenuRepository::update($menuEntity);
    }
}