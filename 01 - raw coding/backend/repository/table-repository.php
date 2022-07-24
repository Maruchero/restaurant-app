<?php

require '../db.php';
require '../entities/table-entity.php';

class TableRepository {
    public static function fetchAll() {
        $sql = "SELECT * FROM tables";
        $result = Database::getPdo()->query($sql);
        $tables = [];
        while ($row = $result->fetch()) {
            $tables[] = new TableEntity($row['id'], $row['number'], $row['free'], $row['orders'], $row['id_restaurant']);
        }
        return $tables;
    }

    public static function fetchAllByRestaurantId($id) {
        $sql = "SELECT * FROM tables WHERE id_restaurant = $id";
        $result = Database::getPdo()->query($sql);
        $tables = [];
        while ($row = $result->fetch()) {
            $tables[] = new TableEntity($row['id'], $row['number'], $row['free'], $row['orders'], $row['id_restaurant']);
        }
        return $tables;
    }

    public static function fetchFreeByRestaurantId($id) {
        $sql = "SELECT * FROM tables WHERE id_restaurant = $id AND free = true";
        $result = Database::getPdo()->query($sql);
        $tables = [];
        while ($row = $result->fetch()) {
            $tables[] = new TableEntity($row['id'], $row['number'], $row['free'], $row['orders'], $row['id_restaurant']);
        }
        return $tables;
    }

    public static function add(TableEntity $table): void {
        $sql = "INSERT INTO tables (number, free, orders, id_restaurant) VALUES ('" . $table->getNumber() . "', '" . $table->isFree() . "', '" . $table->getOrders() . $table->getIdRestaurant() . "')";
        Database::getPdo()->exec($sql);
    }

    public static function delete(TableEntity $table): void {
        $sql = "DELETE FROM tables WHERE id = " . $table->getId();
        Database::getPdo()->exec($sql);
    }

    public static function update(TableEntity $table): void {
        $sql = "UPDATE tables SET number = '" . $table->getNumber() . "', free = '" . $table->isFree() . "', orders = '" . $table->getOrders() . "', id_restaurant = '" . $table->getIdRestaurant() . "' WHERE id = " . $table->getId();
        Database::getPdo()->exec($sql);
    }
}