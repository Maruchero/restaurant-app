<?php

class MenuRepository {
    public static function fetchAll() {
        $sql = "SELECT * FROM menu";
        $result = Database::getPdo()->query($sql);
        $menus = [];
        while ($row = $result->fetch()) {
            $menus[] = new MenuEntity($row['id'], $row['name'], $row['description'], $row['id_restaurant']);
        }
        return $menus;
    }

    public static function add(MenuEntity $menu): void {
        $sql = "INSERT INTO menu (name, description, id_restaurant) VALUES ('" . $menu->getName() . "', '" . $menu->getDescription() . "', '" . $menu->getIdRestaurant() . "')";
        Database::getPdo()->exec($sql);
    }

    public static function delete(MenuEntity $menu): void {
        $sql = "DELETE FROM menu WHERE id = " . $menu->getId();
        Database::getPdo()->exec($sql);
    }

    public static function update(MenuEntity $menu): void {
        $sql = "UPDATE menu SET name = '" . $menu->getName() . "', description = '" . $menu->getDescription() . "', id_restaurant = '" . $menu->getIdRestaurant() . "' WHERE id = " . $menu->getId();
        Database::getPdo()->exec($sql);
    }
}