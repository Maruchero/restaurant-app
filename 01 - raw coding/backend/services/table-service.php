<?php

require '../dtos/table-dto.php';
require '../repository/table-repository.php';

class TableService {
    public static function fetchAll() {
        $tables = TableRepository::fetchAll();
        $dtos = [];
        foreach ($tables as $table) {
            $dtos[] = new TableDTO($table->getId(), $table->getName(), $table->getIdRestaurant());
        }
        return $dtos;
    }
    
    public static function add(TableDTO $table): void {
        $tableEntity = new TableEntity($table->getId(), $table->getName(), $table->getIdRestaurant());
        // if id is already set then update, otherwise insert
        if ($table->getId() !== null) {
            TableRepository::update($table);
        } else {
            TableRepository::add($table);
        }
    }
    
    public static function delete(TableDTO $table): void {
        $tableEntity = new TableEntity($table->getId(), $table->getName(), $table->getIdRestaurant());
        TableRepository::delete($tableEntity);
    }
}