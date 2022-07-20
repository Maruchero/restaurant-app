<?php

class Database
{
    private static $username = "root";
    private static $password = "Under3nder";
    private static $host = "localhost";
    private static $dbname = "dbrestaurants";

    public static function getPdo() {
        return new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
    }
}

?>
