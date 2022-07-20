<?php

require '../db.php';
require '../entities/dish-entity.php';

class DishesRepository {
    public static function getAll(): array {
        $sql = "SELECT * FROM dishes";
        $result = Database::getPdo()->query($sql);
        $dishes = [];
        while ($row = $result->fetch()) {
            $dishes[] = new DishEntity($row['id'], $row['name'], $row['ingredients'], $row['id_menu']);
        }
        return $dishes;
    }

    public static function addDish(DishEntity $dish): void {
        $sql = "INSERT INTO dishes (name, ingredients, id_menu) VALUES ('" . $dish->getName() . "', '" . $dish->getIngredients() . "', '" . $dish->getIdMenu() . "')";
        Database::getPdo()->exec($sql);
    }
}

// echo getAll
echo "<h2>Dishes</h2>";
echo "<table border>";
echo "<tr><th>Id</th><th>Name</th><th>Ingredients</th><th>Menu id</th>";
foreach (DishesRepository::getAll() as $dish) {
    echo "<tr>";
    echo "<td>" . $dish->getId() . "</td>";
    echo "<td>" . $dish->getName() . "</td>";
    echo "<td>" . $dish->getIngredients() . "</td>";
    echo "<td>" . $dish->getIdMenu() . "</td>";
    echo "</tr>";
}
echo "</table>";

?>
