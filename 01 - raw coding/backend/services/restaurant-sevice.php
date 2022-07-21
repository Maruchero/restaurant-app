<?php

require '../dtos/restaurant-dto.php';
require '../repository/restaurant-repository.php';

class RestaurantService {
    public static function fetchAll() {
        $restaurants = RestaurantRepository::fetchAll();
        $dtos = [];
        foreach ($restaurants as $restaurant) {
            $dtos[] = new RestaurantDTO($restaurant->getId(), $restaurant->getName(), $restaurant->getAddress(), $restaurant->getPhone(), $restaurant->getEmail());
        }
        return $dtos;
    }
    
    public static function add(RestaurantDTO $restaurant): void {
        $restaurantEntity = new RestaurantEntity($restaurant->getId(), $restaurant->getName(), $restaurant->getAddress(), $restaurant->getPhone(), $restaurant->getEmail());
        // if id is already set then update, otherwise insert
        if ($restaurant->getId() !== null) {
            RestaurantRepository::update($restaurant);
        } else {
            RestaurantRepository::add($restaurant);
        }
    }
    
    public static function delete(RestaurantDTO $restaurant): void {
        $restaurantEntity = new RestaurantEntity($restaurant->getId(), $restaurant->getName(), $restaurant->getAddress(), $restaurant->getPhone(), $restaurant->getEmail());
        RestaurantRepository::delete($restaurantEntity);
    }
}