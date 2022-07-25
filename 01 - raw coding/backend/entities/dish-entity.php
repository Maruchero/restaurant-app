<?php

class DishEntity
{
    private $id;
    private $name;
    private $ingredients;
    private $price;
    private $id_menu;

    public function __construct($id, $name, $ingredients, $price, $id_menu)
    {
        $this->id = $id;
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->price = $price;
        $this->id_menu = $id_menu;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function getIdMenu()
    {
        return $this->id_menu;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function __toString()
    {
        return "DishEntity{" .
            "id=" . $this->id .
            ", name='" . $this->name . '\'' .
            ", ingredients='" . $this->ingredients . '\'' .
            ", price=" . $this->price .
            ", id_menu=" . $this->id_menu .
            '}';
    }
}
