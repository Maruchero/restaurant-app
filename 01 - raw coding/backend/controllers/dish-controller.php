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
