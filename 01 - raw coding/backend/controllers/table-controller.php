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
    
    public static function add(array $table) {
        $tableDTO = new TableDTO($table['id'], $table['name'], $table['description']);
        TableService::add($tableDTO);
    }
    
    public static function delete(array $table) {
        $tableDTO = new TableDTO($table['id'], $table['name'], $table['description']);
        TableService::delete($tableDTO);
    }
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'getAll':
            echo json_encode(TableController::fetchAll());
            break;
        
        default:
            echo 'Invalid request: ' . $_REQUEST['action'];
            break;
    }
} else {
    echo 'Invalid request: no action specified';
}