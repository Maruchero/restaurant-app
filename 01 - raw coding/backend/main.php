<?php
$servername = "localhost";
$username = "root";
$password = "Under3nder";

$pdo = new PDO("mysql:host=$servername;dbname=dbrestaurants", $username, $password);

$sql = "USE dbrestaurants";
$pdo->exec($sql);

// echo  a table with the restaurants
$sql = "SELECT * FROM restaurants";
$result = $pdo->query($sql);
echo "<h2>Restaurants</h2>";
echo "<table border>";
echo "<tr><th>Id</th><th>Name</th>";
while ($row = $result->fetch()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// echo a table with the menus
$sql = "SELECT * FROM menus";
$result = $pdo->query($sql);
echo "<h2>Menus</h2>";
echo "<table border>";
echo "<tr><th>Id</th><th>Name</th><th>Create date</th><th>Modify date</th><th>Restaurant id</th>";
while ($row = $result->fetch()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['create_date'] . "</td>";
    echo "<td>" . $row['modify_date'] . "</td>";
    echo "<td>" . $row['id_restaurant'] . "</td>";
    echo "</tr>";
}

// echo a table with the dishes
$sql = "SELECT * FROM dishes";
$result = $pdo->query($sql);
echo "<h2>Dishes</h2>";
echo "<table border>";
echo "<tr><th>Id</th><th>Name</th><th>Ingredients</th><th>Menu id</th>";
while ($row = $result->fetch()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['ingredients'] . "</td>";
    echo "<td>" . $row['id_menu'] . "</td>";
    echo "</tr>";
}
  
?>