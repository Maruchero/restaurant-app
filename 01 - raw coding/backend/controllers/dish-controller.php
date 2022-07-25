<?php

require '../services/dish-service.php';

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
                echo '{"data":' . toJson(DishService::fetchAll()) . '}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'fetchByMenuId':
            try {
                echo '{"data": "' . toJson(DishService::fetchByMenuId($_REQUEST['id'])) . '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'add':
            try {
                $dish = json_decode($_REQUEST['dish']);
                echo '{"data": "' .
                    DishService::add(new DishDTO(NULL, $dish->name, $dish->ingredients, $dish->price, $dish->id_menu)) .
                    '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'delete':
            try {
                $dish = json_decode($_REQUEST['dish']);
                echo '{"data": "' .
                    DishService::delete(new DishDTO($dish->id, $dish->name, $dish->ingredients, $dish->price, $dish->id_menu)) .
                    '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'update':
            try {
                $dish = json_decode($_REQUEST['dish']);
                echo '{"data": "' .
                    DishService::update(new DishDTO($dish->id, $dish->name, $dish->ingredients, $dish->price, $dish->id_menu)) .
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
    echo '{"error": "Invalid action: ' . $_REQUEST['action'] . '"}';
}
