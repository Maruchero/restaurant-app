<?php

class TableDTO {
    private $id;
    private $number;
    private $orders;
    private $id_restaurant;

    public function __construct($id, $number, $orders, $id_restaurant) {
        $this->id = $id;
        $this->number = $number;
        $this->orders = $orders;
        $this->id_restaurant = $id_restaurant;
    }

    public function getId() {
        return $this->id;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getOrders() {
        return $this->orders;
    }

    public function getIdRestaurant() {
        return $this->id_restaurant;
    }

    public function __toString() {
        return "TableDTO{" .
                "id=" . $this->id .
                ", number=" . $this->number .
                ", orders=" . $this->orders .
                ", id_restaurant=" . $this->id_restaurant .
                '}';
    }

    public function toJson() {
        return array(
            "id" => $this->id,
            "number" => $this->number,
            "orders" => $this->orders,
            "id_restaurant" => $this->id_restaurant
        );
    }
}
