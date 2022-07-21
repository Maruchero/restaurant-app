<?php

require '../dtos/menu-dto.php';
require '../repository/menu-repository.php';

class MenuService {
    public static function fetchAll() {
        $menus = MenuRepository::fetchAll();
        $dtos = [];
        foreach ($menus as $menu) {
            $dtos[] = new MenuDTO($menu->getId(), $menu->getName(), $menu->getDescription(), $menu->getIdRestaurant());
        }
        return $dtos;
    }
    
    public static function add(MenuDTO $menu): void {
        $menuEntity = new MenuEntity($menu->getId(), $menu->getName(), $menu->getDescription(), $menu->getIdRestaurant());
        // if id is already set then update, otherwise insert
        if ($menu->getId() !== null) {
            MenuRepository::update($menu);
        } else {
            MenuRepository::add($menu);
        }
    }
    
    public static function delete(MenuDTO $menu): void {
        $menuEntity = new MenuEntity($menu->getId(), $menu->getName(), $menu->getDescription(), $menu->getIdRestaurant());
        MenuRepository::delete($menuEntity);
    }
}