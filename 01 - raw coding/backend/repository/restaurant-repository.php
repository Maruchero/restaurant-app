<?php

class RestaurantRepository {
    public static function fetchAll() {
        $sql = "SELECT * FROM restaurants";
        $result = Database::getPdo()->query($sql);
        $restaurants = [];
        while ($row = $result->fetch()) {
            $restaurants[] = new RestaurantEntity($row['id'], $row['name'], $row['address'], $row['phone'], $row['email']);
        }
        return $restaurants;
    }

    public static function add(RestaurantEntity $restaurant): void {
        $sql = "INSERT INTO restaurants (name, address, phone, email) VALUES ('" . $restaurant->getName() . "', '" . $restaurant->getAddress() . "', '" . $restaurant->getPhone() . "', '" . $restaurant->getEmail() . "')";
        Database::getPdo()->exec($sql);
    }

    public static function delete(RestaurantEntity $restaurant): void {
        $sql = "DELETE FROM restaurants WHERE id = " . $restaurant->getId();
        Database::getPdo()->exec($sql);
    }

    public static function update(RestaurantEntity $restaurant): void {
        $sql = "UPDATE restaurants SET name = '" . $restaurant->getName() . "', address = '" . $restaurant->getAddress() . "', phone = '" . $restaurant->getPhone() . "', email = '" . $restaurant->getEmail() . "' WHERE id = " . $restaurant->getId();
        Database::getPdo()->exec($sql);
    }
}