<?php

require '../services/restaurant-service.php';

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
                echo '{"data": ' . toJson(RestaurantService::fetchAll()) . '}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'add':
            try {
                $restaurant = json_decode($_REQUEST['restaurant']);
                echo '{"data": "' . RestaurantService::add(new RestaurantDTO(NULL, $restaurant->name)) . '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'delete':
            try {
                $restaurant = json_decode($_REQUEST['restaurant']);
                echo '{"data": "' . RestaurantService::delete(new RestaurantDTO($restaurant->id, $restaurant->name)) . '"}';
            } catch (Exception $e) {
                echo '{"error": "' . $e->getMessage() . '"}';
            }
            break;

        case 'update':
            try {
                $restaurant = json_decode($_REQUEST['restaurant']);
                echo '{"data": "' . RestaurantService::update(new RestaurantDTO($restaurant->id, $restaurant->name)) . '"}';
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
