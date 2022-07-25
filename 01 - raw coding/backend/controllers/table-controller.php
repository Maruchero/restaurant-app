<?php

require '../services/table-service.php';

function toJson($dtos)
{
    $json = [];
    foreach ($dtos as $dto) $json[] = $dto->toJson();
    return json_encode($json);
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'fetchAll':
            try {
                echo '{"data":' . toJson(TableService::fetchAll()) . '}';
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            break;

        case 'fetchByRestaurantId':
            try {
                echo '{"data": "' . toJson(TableService::fetchAllByRestaurantId($_REQUEST['id'])) . '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'fetchFreeByRestaurantId':
            try {
                echo '{"data": "' . toJson(TableService::fetchFreeByRestaurantId($_REQUEST['id'])) . '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'add':
            try {
                $table = json_decode($_REQUEST['table']);
                echo '{"data": "' .
                    TableService::add(new TableDTO(NULL, $table->number, $table->free, $table->orders, $table->id_restaurant)) .
                    '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'delete':
            try {
                $table = json_decode($_REQUEST['table']);
                echo '{"data": "' .
                    TableService::delete(new TableDTO($table->id, $table->number, $table->free, $table->orders, $table->id_restaurant)) .
                    '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'update':
            try {
                $table = json_decode($_REQUEST['table']);
                echo '{"data": "' .
                    TableService::update(new TableDTO($table->id, $table->number, $table->free, $table->orders, $table->id_restaurant)) .
                    '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        default:
            echo '{"error": "Invalid action: ' . $_REQUEST['action'] . '"}';
            break;
    }
} else {
    echo '{"error": "No action specified"}';
}
