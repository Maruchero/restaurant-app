<?php

class MenuDTO {
    private $id;
    private $name;
    private $create_date;
    private $modify_date;
    private $id_restaurant;

    public function __construct($id, $name, $create_date, $modify_date, $id_restaurant) {
        $this->id = $id;
        $this->name = $name;
        $this->create_date = $create_date;
        $this->modify_date = $modify_date;
        $this->id_restaurant = $id_restaurant;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCreateDate() {
        return $this->create_date;
    }

    public function getModifyDate() {
        return $this->modify_date;
    }

    public function getIdRestaurant() {
        return $this->id_restaurant;
    }

    public function __toString() {
        return "MenuDTO{" .
                "id=" . $this->id .
                ", name='" . $this->name . '\'' .
                ", create_date='" . $this->create_date . '\'' .
                ", modify_date='" . $this->modify_date . '\'' .
                ", id_restaurant=" . $this->id_restaurant .
                '}';
    }

    public function toJson() {
        return array(
            "id" => $this->id,
            "name" => $this->name,
            "create_date" => $this->create_date,
            "modify_date" => $this->modify_date,
            "id_restaurant" => $this->id_restaurant
        );
    }
}