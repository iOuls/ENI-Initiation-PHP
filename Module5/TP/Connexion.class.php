<?php

/*
class Connexion extends PDO
{
    private static $_instance = null;

    public function __construct()
    {
    }

    public static function connexion()
    {
        if (is_null(self::$_instance)) {
            try {
                $dsn = 'mysql:host=localhost;dbname=tp';
                $id = 'root';
                $pass = 'Passw0rd';

                self::$_instance = new PDO($dsn, $id, $pass);
                return self::$_instance;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$_instance;
    }
}
*/

class Connexion extends PDO
{
    private static $_instance = false;
    private static $dsn = 'mysql:host=localhost;dbname=tp';
    private static $id = 'root';
    private static $pass = 'Passw0rd';

    public function __construct()
    {
    }

    public static function connexion()
    {
        if (!self::$_instance) {
            try {
                self::$_instance = new PDO(self::$dsn, self::$id, self::$pass);
                return self::$_instance;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$_instance;
    }
}