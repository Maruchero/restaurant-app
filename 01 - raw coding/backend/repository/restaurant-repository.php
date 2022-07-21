<?php

require '../db.php';
require '../entities/restaurant-entity.php';

class RestaurantRepository {
    public static function fetchAll() {
        $sql = "SELECT * FROM restaurants";
        $result = Database::getPdo()->query($sql);
        $restaurants = [];
        while ($row = $result->fetch()) {
            $restaurants[] = new RestaurantEntity($row['id'], $row['name']);
        }
        return $restaurants;
    }

    public static function add(RestaurantDTO $restaurant): void {
        $sql = "INSERT INTO restaurants (name) VALUES ('" . $restaurant->getName() . "')";
        Database::getPdo()->exec($sql);
    }

    public static function delete(RestaurantDTO $restaurant): void {
        $sql = "DELETE FROM restaurants WHERE id = " . $restaurant->getId();
        Database::getPdo()->exec($sql);
    }

    public static function update(RestaurantDTO $restaurant): void {
        $sql = "UPDATE restaurants SET name = '" . $restaurant->getName() . "' WHERE id = " . $restaurant->getId();
        Database::getPdo()->exec($sql);
    }
}