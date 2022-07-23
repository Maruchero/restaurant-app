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
    
    public static function add(DishDTO $dish): void {
        $dishEntity = new DishEntity($dish->getId(), $dish->getName(), $dish->getIngredients(), $dish->getPrice(), $dish->getIdMenu());
        // if id is already set then update, otherwise insert
        if ($dish->getId() !== null) {
            DishRepository::update($dish);
        } else {
            DishRepository::add($dish);
        }
    }

    public static function delete(DishDTO $dish): void {
        $dishEntity = new DishEntity($dish->getId(), $dish->getName(), $dish->getIngredients(), $dish->getPrice(), $dish->getIdMenu());
        DishRepository::delete($dishEntity);
    }
}
