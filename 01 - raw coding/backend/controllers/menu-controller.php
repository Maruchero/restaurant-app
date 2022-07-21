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
        $menuDTO = new MenuDTO($menu['id'], $menu['name'], $menu['create_date'], $menu['modify_date'], $menu['restaurant_id']);
        MenuService::add($menuDTO);
    }
    
    public static function delete(array $menu) {
        $menuDTO = new MenuDTO($menu['id'], $menu['name'], $menu['create_date'], $menu['modify_date'], $menu['restaurant_id']);
        MenuService::delete($menuDTO);
    }
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'getAll':
            echo json_encode(MenuController::fetchAll());
            break;
        
        default:
            echo 'Invalid request: ' . $_REQUEST['action'];
            break;
    }
} else {
    echo 'Invalid request: no action specified';
}