<?php

require '../db.php';
require '../entities/table-entity.php';

class TableRepository {
    public static function fetchAll() {
        $sql = "SELECT * FROM tables";
        $result = Database::getPdo()->query($sql);
        $tables = [];
        while ($row = $result->fetch()) {
            $tables[] = new TableEntity($row['id'], $row['name'], $row['id_restaurant']);
        }
        return $tables;
    }

    public static function add(TableEntity $table): void {
        $sql = "INSERT INTO tables (name, id_restaurant) VALUES ('" . $table->getName() . "', '" . $table->getIdRestaurant() . "')";
        Database::getPdo()->exec($sql);
    }

    public static function delete(TableEntity $table): void {
        $sql = "DELETE FROM tables WHERE id = " . $table->getId();
        Database::getPdo()->exec($sql);
    }

    public static function update(TableEntity $table): void {
        $sql = "UPDATE tables SET name = '" . $table->getName() . "', id_restaurant = '" . $table->getIdRestaurant() . "' WHERE id = " . $table->getId();
        Database::getPdo()->exec($sql);
    }
}