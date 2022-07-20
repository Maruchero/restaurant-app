<?php

class DishDTO {
    private $id;
    private $name;
    private $ingredients;
    private $id_menu;
    
    public function __construct($id, $name, $ingredients, $id_menu) {
        $this->id = $id;
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->id_menu = $id_menu;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getIngredients() {
        return $this->ingredients;
    }
    
    public function getIdMenu() {
        return $this->id_menu;
    }

    public function __toString() {
        return "DishDTO{" .
                "id=" . $this->id .
                ", name='" . $this->name . '\'' .
                ", ingredients='" . $this->ingredients . '\'' .
                ", id_menu=" . $this->id_menu .
                '}';
    }

    public function toJson() {
        return array(
            "id" => $this->id,
            "name" => $this->name,
            "ingredients" => $this->ingredients,
            "id_menu" => $this->id_menu
        );
    }
}