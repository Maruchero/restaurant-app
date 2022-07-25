<?php

require '../db.php';
require '../entities/restaurant-entity.php';

class RestaurantRepository
{
    public static function fetchAll()
    {
        $sql = "SELECT * FROM restaurants";
        $result = Database::getPdo()->query($sql);
        $restaurants = [];
        while ($row = $result->fetch()) {
            $restaurants[] = new RestaurantEntity($row['id'], $row['name']);
        }
        return $restaurants;
    }

    public static function add(RestaurantEntity $restaurant)
    {
        $sql = "INSERT INTO restaurants (name) VALUES ('" . $restaurant->getName() . "')";
        Database::getPdo()->exec($sql);
        return "Successfully added restaurant";
    }

    public static function delete(RestaurantEntity $restaurant)
    {
        $sql = "DELETE FROM restaurants WHERE id = " . $restaurant->getId();
        Database::getPdo()->exec($sql);
        return "Successfully deleted restaurant";
    }

    public static function update(RestaurantEntity $restaurant)
    {
        $sql = "UPDATE restaurants SET name = '" . $restaurant->getName() . "' WHERE id = " . $restaurant->getId();
        Database::getPdo()->exec($sql);
        return "Successfully updated restaurant";
    }
}
