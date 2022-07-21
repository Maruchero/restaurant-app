<?php

class RestaurantDTO {
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
        return "RestaurantDTO{" .
                "id=" . $this->id .
                ", name='" . $this->name . '\'' .
                '}';
    }

    public function toJson() {
        return array(
            "id" => $this->id,
            "name" => $this->name
        );
    }
}