<?php

class RestaurantEntity {
    private $id;
    private $name;
    private $create_date;
    private $modify_date;
    private $id_user;
    
    public function __construct($id, $name, $create_date, $modify_date, $id_user) {
        $this->id = $id;
        $this->name = $name;
        $this->create_date = $create_date;
        $this->modify_date = $modify_date;
        $this->id_user = $id_user;
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
    
    public function getIdUser() {
        return $this->id_user;
    }
    
    public function __toString() {
        return "RestaurantEntity{" .
                "id=" . $this->id .
                ", name='" . $this->name . '\'' .
                ", create_date='" . $this->create_date . '\'' .
                ", modify_date='" . $this->modify_date . '\'' .
                ", id_user=" . $this->id_user .
                '}';
    }
}