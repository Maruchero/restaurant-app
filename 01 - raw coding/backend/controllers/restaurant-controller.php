<?php

require '../services/restaurant-service.php';

class RestaurantController {
    public static function fetchAll() {
        $restaurants = RestaurantService::fetchAll();
        $json = [];
        foreach ($restaurants as $restaurant) {
            $json[] = $restaurant->toJson();
        }
        return $json;
    }
    
    public static function add(array $restaurant) {
        $restaurantDTO = new RestaurantDTO($restaurant['name']);
        RestaurantService::add($restaurantDTO);
    }
    
    public static function delete(array $restaurant) {
        $restaurantDTO = new RestaurantDTO($restaurant['id'], $restaurant['name']);
        RestaurantService::delete($restaurantDTO);
    }

    public static function update(array $restaurant) {
        $restaurantDTO = new RestaurantDTO($restaurant['id'], $restaurant['name']);
        RestaurantService::update($restaurantDTO);
    }
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'fetchAll':
            echo json_encode(RestaurantController::fetchAll());
            break;

        case 'add':
            RestaurantController::add($_REQUEST['restaurant']);
            break;

        case 'delete':
            RestaurantController::delete($_REQUEST['restaurant']);
            break;

        case 'update':
            RestaurantController::update($_REQUEST['restaurant']);
            break;
        
        default:
            echo 'Invalid request: ' . $_REQUEST['action'];
            break;
    }
} else {
    echo 'Invalid request: no action specified';
}
