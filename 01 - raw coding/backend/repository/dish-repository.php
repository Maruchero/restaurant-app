<?php

require '../db.php';
require '../entities/dish-entity.php';

class DishRepository {
    public static function fetchAll() {
        $sql = "SELECT * FROM dishes";
        $result = Database::getPdo()->query($sql);
        $dishes = [];
        while ($row = $result->fetch()) {
            $dishes[] = new DishEntity($row['id'], $row['name'], $row['ingredients'], $row['id_menu']);
        }
        return $dishes;
    }

    public static function add(DishEntity $dish): void {
        $sql = "INSERT INTO dishes (name, ingredients, id_menu) VALUES ('" . $dish->getName() . "', '" . $dish->getIngredients() . "', '" . $dish->getIdMenu() . "')";
        Database::getPdo()->exec($sql);
    }

    public static function delete(DishEntity $dish): void {
        $sql = "DELETE FROM dishes WHERE id = " . $dish->getId();
        Database::getPdo()->exec($sql);
    }

    public static function update(DishEntity $dish): void {
        $sql = "UPDATE dishes SET name = '" . $dish->getName() . "', ingredients = '" . $dish->getIngredients() . "', id_menu = '" . $dish->getIdMenu() . "' WHERE id = " . $dish->getId();
        Database::getPdo()->exec($sql);
    }
}
