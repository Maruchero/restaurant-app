<?php

require '../services/table-service.php';

class TableController {
    public static function fetchAll() {
        $tables = TableService::fetchAll();
        $json = [];
        foreach ($tables as $table) {
            $json[] = $table->toJson();
        }
        return $json;
    }

    public static function fetchAllByRestaurantId($id) {
        $tables = TableService::fetchAllByRestaurantId($id);
        $json = [];
        foreach ($tables as $table) {
            $json[] = $table->toJson();
        }
        return $json;
    }

    public static function fetchFreeByRestaurantId($id) {
        $tables = TableService::fetchFreeByRestaurantId($id);
        $json = [];
        foreach ($tables as $table) {
            $json[] = $table->toJson();
        }
        return $json;
    }

    public static function add($table) {
        try {
            $table = json_decode($table);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        $table = new TableDTO($table->number, $table->free, $table->orders, $table->id_restaurant);
        TableService::add($table);
    }

    public static function delete($table) {
        try {
            $table = json_decode($table);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        $table = new TableDTO($table->id, $table->number, $table->free, $table->orders, $table->id_restaurant);
        TableService::delete($table);
    }

    public static function update($table) {
        try {
            $table = json_decode($table);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        $table = new TableDTO($table->id, $table->number, $table->free, $table->orders, $table->id_restaurant);
        TableService::update($table);
    }
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'fetchAll':
            echo json_encode(TableController::fetchAll());
            break;

        case 'fetchByRestaurantId':
            echo json_encode(TableController::fetchAllByRestaurantId($_REQUEST['id']));
            break;

        case 'fetchFreeByRestaurantId':
            echo json_encode(TableController::fetchFreeByRestaurantId($_REQUEST['id']));
            break;

        case 'add':
            TableController::add($_REQUEST['table']);
            break;

        case 'delete':
            TableController::delete($_REQUEST['table']);
            break;
        
        default:
            echo 'Invalid request: ' . $_REQUEST['action'];
            break;
    }
} else {
    echo 'Invalid request: no action specified';
}