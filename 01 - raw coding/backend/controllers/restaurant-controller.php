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
        $restaurantDTO = new RestaurantDTO($restaurant['id'], $restaurant['name'], $restaurant['address'], $restaurant['phone']);
        RestaurantService::add($restaurantDTO);
    }
    
    public static function delete(array $restaurant) {
        $restaurantDTO = new RestaurantDTO($restaurant['id'], $restaurant['name'], $restaurant['address'], $restaurant['phone']);
        RestaurantService::delete($restaurantDTO);
    }
}