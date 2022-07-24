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

    public static function fetchByRestaurantId($id) {
        $menus = MenuService::fetchByRestaurantId($id);
        $json = [];
        foreach ($menus as $menu) {
            $json[] = $menu->toJson();
        }
        return $json;
    }
    
    public static function add(array $menu) {
        $menuDTO = new MenuDTO($menu['name'], $menu['create_date'], $menu['modify_date'], $menu['restaurant_id']);
        MenuService::add($menuDTO);
    }
    
    public static function delete(array $menu) {
        $menuDTO = new MenuDTO($menu['id'], $menu['name'], $menu['create_date'], $menu['modify_date'], $menu['restaurant_id']);
        MenuService::delete($menuDTO);
    }

    public static function update(array $menu) {
        $menuDTO = new MenuDTO($menu['id'], $menu['name'], $menu['create_date'], $menu['modify_date'], $menu['restaurant_id']);
        MenuService::update($menuDTO);
    }
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'fetchAll':
            echo json_encode(MenuController::fetchAll());
            break;

        case 'fetchByRestaurantId':
            echo json_encode(MenuController::fetchByRestaurantId($_REQUEST['id']));
            break;

        case 'add':
            MenuController::add($_REQUEST['menu']);
            break;

        case 'delete':
            MenuController::delete($_REQUEST['menu']);
            break;

        case 'update':
            MenuController::update($_REQUEST['menu']);
            break;
        
        default:
            echo 'Invalid request: ' . $_REQUEST['action'];
            break;
    }
} else {
    echo 'Invalid request: no action specified';
}