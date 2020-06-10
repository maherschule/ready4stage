<?php
namespace app\DB;
class DB {

private static $hook;

public static function connect($s = "", $user = "", $pass = "")
{
    try {
        // Singelton
        self::$hook = new \PDO("mysql:host=" . $s . ";charset=utf8", $user, $pass);

        if (self::$hook) {
            return self::$hook;
        }
    } catch (\PDOException $e) {
        print_r("Error!: " . $e->getMessage());
        die();
    }
}

}