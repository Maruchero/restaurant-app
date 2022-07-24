<?php

require '../services/dish-service.php';

class DishController {
    public static function fetchAll() {
        $dishes = DishService::fetchAll();
        $json = [];
        foreach ($dishes as $dish) {
            $json[] = $dish->toJson();
        }
        return $json;
    }

    public static function fetchByMenuId($id) {
        $dishes = DishService::fetchByMenuId($id);
        $json = [];
        foreach ($dishes as $dish) {
            $json[] = $dish->toJson();
        }
        return $json;
    }

    public static function add(array $dish) {
        $dishDTO = new DishDTO($dish['name'], $dish['ingredients'], $dish['price'], $dish['id_menu']);
        DishService::add($dishDTO);
    }

    public static function delete(array $dish) {
        $dishDTO = new DishDTO($dish['id'], $dish['name'], $dish['ingredients'], $dish['price'], $dish['id_menu']);
        DishService::delete($dishDTO);
    }

    public static function update(array $dish) {
        $dishDTO = new DishDTO($dish['id'], $dish['name'], $dish['ingredients'], $dish['price'], $dish['id_menu']);
        DishService::update($dishDTO);
    }
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'fetchAll':
            echo json_encode(DishController::fetchAll());
            break;

        case 'fetchByMenuId':
            echo json_encode(DishController::fetchByMenuId($_REQUEST['id']));
            break;

        case 'add':
            DishController::add($_REQUEST['dish']);
            break;

        case 'delete':
            DishController::delete($_REQUEST['dish']);
            break;
            
        case 'update':
            DishController::update($_REQUEST['dish']);
            break;

        default:
            echo 'Invalid request: ' . $_REQUEST['action'];
            break;
    }
} else {
    echo 'Invalid request: no action specified';
}
