<?php

class DBHandler {
    private static $pdo;

    private function __construct() {}

    public static function getPDO() {
        if (self::$pdo == null) {
            self::connect_database();
        }
        return self::$pdo;
    }

    private static function connect_database() {
        try {
            $connection_string = 'mysql:host=localhost;dbname=finalproject;charset=utf8';
            $connection_array = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
            self::$pdo = new PDO($connection_string, 'root', '', $connection_array);
        }
        catch (PDOException $e) {
            self::$pdo = null;
        }
    }
}
?>