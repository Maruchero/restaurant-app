<?php

class Database
{
    private static $username = "root";
    private static $password = "";
    private static $host = "localhost";
    private static $dbname = "db_restaurants";

    public static function getPdo() {
        return new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
    }
}

?>
