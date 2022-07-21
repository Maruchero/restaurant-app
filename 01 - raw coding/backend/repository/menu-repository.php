<?php

require '../db.php';
require '../entities/menu-entity.php';

class MenuRepository {
    public static function fetchAll() {
        $sql = "SELECT * FROM menu";
        $result = Database::getPdo()->query($sql);
        $menus = [];
        while ($menu = $result->fetch()) {
            $menus[] = new MenuEntity($menu['id'], $menu['name'], $menu['create_date'], $menu['modify_date'], $menu['id_restaurant']);
        }
        return $menus;
    }

    public static function add(MenuDTO $menu): void {
        $sql = "INSERT INTO menu (name, create_date, modify_date, id_restaurant) VALUES ('" . $menu->getName() . "', '" . $menu->getCreateDate() . "', '" . $menu->getModifyDate() . "', '" . $menu->getIdRestaurant() . "')";
        Database::getPdo()->exec($sql);
    }

    public static function delete(MenuDTO $menu): void {
        $sql = "DELETE FROM menu WHERE id = " . $menu->getId();
        Database::getPdo()->exec($sql);
    }

    public static function update(MenuDTO $menu): void {
        $sql = "UPDATE menu SET name = '" . $menu->getName() . "', create_date = '" . $menu->getCreateDate() . "', modify_date = '" . $menu->getModifyDate() . "', id_restaurant = '" . $menu->getIdRestaurant() . "' WHERE id = " . $menu->getId();
        Database::getPdo()->exec($sql);
    }
}