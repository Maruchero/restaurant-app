<?php

require '../db.php';
require '../entities/dish-entity.php';

class DishRepository
{
    public static function fetchAll()
    {
        $sql = "SELECT * FROM dishes";
        $result = Database::getPdo()->query($sql);
        $dishes = [];
        while ($row = $result->fetch()) {
            $dishes[] = new DishEntity($row['id'], $row['name'], $row['ingredients'], $row['price'], $row['id_menu']);
        }
        return $dishes;
    }

    public static function fetchByMenuId($id)
    {
        $sql = "SELECT * FROM dishes WHERE id_menu = $id";
        $result = Database::getPdo()->query($sql);
        $dishes = [];
        while ($row = $result->fetch()) {
            $dishes[] = new DishEntity($row['id'], $row['name'], $row['ingredients'], $row['price'], $row['id_menu']);
        }
        return $dishes;
    }

    public static function add(DishEntity $dish)
    {
        $sql = "INSERT INTO dishes (name, ingredients, price, id_menu) VALUES ('" . $dish->getName() . "', '" . $dish->getIngredients() . "', '" . $dish->getPrice() . "', '" . $dish->getIdMenu() . "')";
        Database::getPdo()->exec($sql);
        return "Successfully added dish";
    }

    public static function delete(DishEntity $dish)
    {
        $sql = "DELETE FROM dishes WHERE id = " . $dish->getId();
        Database::getPdo()->exec($sql);
        return "Successfully deleted dish";
    }

    public static function update(DishEntity $dish)
    {
        $sql = "UPDATE dishes SET name = '" . $dish->getName() . "', ingredients = '" . $dish->getIngredients() . "', price = '" . $dish->getPrice() . "', id_menu = '" . $dish->getIdMenu() . "' WHERE id = " . $dish->getId();
        Database::getPdo()->exec($sql);
        return "Successfully updated dish";
    }
}
