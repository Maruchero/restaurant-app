<?php

class RestaurantEntity {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function __toString() {
        return "DishDTO{" .
                "id=" . $this->id .
                ", name='" . $this->name .
                "'}";
    }
}