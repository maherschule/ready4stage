<?php
namespace app\DB;

use PDO;

class DB {

private static $hook;

public static function connect($s = "", $user = "", $pass = "")
{
    if(self::$hook && self::$hook instanceof PDO) return self::$hook;
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