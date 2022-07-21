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
        $restaurantDTO = new RestaurantDTO($restaurant['id'], $restaurant['name']);
        RestaurantService::add($restaurantDTO);
    }
    
    public static function delete(array $restaurant) {
        $restaurantDTO = new RestaurantDTO($restaurant['id'], $restaurant['name']);
        RestaurantService::delete($restaurantDTO);
    }
}

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'getAll':
            echo json_encode(RestaurantController::fetchAll());
            break;
        
        default:
            echo 'Invalid request: ' . $_REQUEST['action'];
            break;
    }
} else {
    echo 'Invalid request: no action specified';
}
