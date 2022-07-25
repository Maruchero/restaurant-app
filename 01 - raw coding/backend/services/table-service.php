<?php

require '../dtos/table-dto.php';
require '../repository/table-repository.php';

class TableService
{
    public static function fetchAll()
    {
        $tables = TableRepository::fetchAll();
        $dtos = [];
        foreach ($tables as $table) {
            $dtos[] = new TableDTO($table->getId(), $table->getNumber(), $table->isFree(), $table->getOrders(), $table->getIdRestaurant());
        }
        return $dtos;
    }

    public static function fetchAllByRestaurantId($id)
    {
        $tables = TableRepository::fetchAllByRestaurantId($id);
        $dtos = [];
        foreach ($tables as $table) {
            $dtos[] = new TableDTO($table->getId(), $table->getNumber(), $table->isFree(), $table->getOrders(), $table->getIdRestaurant());
        }
        return $dtos;
    }

    public static function fetchFreeByRestaurantId($id)
    {
        $tables = TableRepository::fetchFreeByRestaurantId($id);
        $dtos = [];
        foreach ($tables as $table) {
            $dtos[] = new TableDTO($table->getId(), $table->getNumber(), $table->isFree(), $table->getOrders(), $table->getIdRestaurant());
        }
        return $dtos;
    }

    public static function add(TableDTO $table)
    {
        $table = new TableEntity(NULL, $table->getNumber(), $table->isFree(), $table->getOrders(), $table->getIdRestaurant());
        return TableRepository::add($table);
    }

    public static function delete(TableDTO $table)
    {
        $table = new TableEntity($table->getId(), $table->getNumber(), $table->isFree(), $table->getOrders(), $table->getIdRestaurant());
        return TableRepository::delete($table);
    }

    public static function update(TableDTO $table)
    {
        $table = new TableEntity($table->getId(), $table->getNumber(), $table->isFree(), $table->getOrders(), $table->getIdRestaurant());
        return TableRepository::update($table);
    }
}
