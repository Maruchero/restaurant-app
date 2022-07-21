<?php

require '../services/menu-service.php';

class MenuController {
    public static function fetchAll() {
        $menus = MenuService::fetchAll();
        $json = [];
        foreach ($menus as $menu) {
            $json[] = $menu->toJson();
        }
        return $json;
    }
    
    public static function add(array $menu) {
        $menuDTO = new MenuDTO($menu['id'], $menu['name'], $menu['description']);
        MenuService::add($menuDTO);
    }
    
    public static function delete(array $menu) {
        $menuDTO = new MenuDTO($menu['id'], $menu['name'], $menu['description']);
        MenuService::delete($menuDTO);
    }
}