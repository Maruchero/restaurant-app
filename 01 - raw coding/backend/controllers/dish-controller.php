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

    public static function add(array $dish) {
        $dishDTO = new DishDTO($dish['id'], $dish['name'], $dish['ingredients'], $dish['id_menu']);
        DishService::add($dishDTO);
    }

    public static function delete(array $dish) {
        $dishDTO = new DishDTO($dish['id'], $dish['name'], $dish['ingredients'], $dish['id_menu']);
        DishService::delete($dishDTO);
    }
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'getAll':
            echo json_encode(DishController::fetchAll());
            break;

        default:
            echo 'Invalid request: ' . $_REQUEST['action'];
            break;
    }
} else {
    echo 'Invalid request: no action specified';
}
