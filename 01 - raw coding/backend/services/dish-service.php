<?php

require '../dtos/dish-dto.php';
require '../repository/dish-repository.php';

class DishService {
    public static function fetchAll() {
        $dishes = DishRepository::fetchAll();
        $dtos = [];
        foreach ($dishes as $dish) {
            $dtos[] = new DishDTO($dish->getId(), $dish->getName(), $dish->getIngredients(), $dish->getPrice(), $dish->getIdMenu());
        }
        return $dtos;
    }

    public static function fetchByMenuId($id) {
        $dishes = DishRepository::fetchByMenuId($id);
        $dtos = [];
        foreach ($dishes as $dish) {
            $dtos[] = new DishDTO($dish->getId(), $dish->getName(), $dish->getIngredients(), $dish->getPrice(), $dish->getIdMenu());
        }
        return $dtos;
    }
    
    public static function add(DishDTO $dish): void {
        $dishEntity = new DishEntity($dish->getName(), $dish->getIngredients(), $dish->getPrice(), $dish->getIdMenu());
        DishRepository::add($dishEntity);
    }

    public static function delete(DishDTO $dish): void {
        $dishEntity = new DishEntity($dish->getId(), $dish->getName(), $dish->getIngredients(), $dish->getPrice(), $dish->getIdMenu());
        DishRepository::delete($dishEntity);
    }

    public static function update(DishDTO $dish): void {
        $dishEntity = new DishEntity($dish->getId(), $dish->getName(), $dish->getIngredients(), $dish->getPrice(), $dish->getIdMenu());
        DishRepository::update($dishEntity);
    }
}
