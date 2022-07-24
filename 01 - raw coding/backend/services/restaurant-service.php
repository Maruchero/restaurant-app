<?php

require '../dtos/restaurant-dto.php';
require '../repository/restaurant-repository.php';

class RestaurantService {
    public static function fetchAll() {
        $restaurants = RestaurantRepository::fetchAll();
        $dtos = [];
        foreach ($restaurants as $restaurant) {
            $dtos[] = new RestaurantDTO($restaurant->getId(), $restaurant->getName());
        }
        return $dtos;
    }
    
    public static function add(RestaurantDTO $restaurant): void {
        $restaurantEntity = new RestaurantEntity($restaurant->getName());
        RestaurantRepository::add($restaurantEntity);
    }
    
    public static function delete(RestaurantDTO $restaurant): void {
        $restaurantEntity = new RestaurantEntity($restaurant->getId(), $restaurant->getName());
        RestaurantRepository::delete($restaurantEntity);
    }

    public static function update(RestaurantDTO $restaurant): void {
        $restaurantEntity = new RestaurantEntity($restaurant->getId(), $restaurant->getName());
        RestaurantRepository::update($restaurantEntity);
    }
}