<?php

namespace Library\Core;

use \PDO;
use \PDOException;
use Library\Core\Utility;

class DB
{
    private static PDO $db;

    public static function connect(string $config) : PDO | string
    {
        $settings = Utility::readConfig($config);
        try{
            self::$db = new PDO(
                "{$settings['DATABASE']}:host={$settings['DB_HOST']};
                port={$settings['DB_PORT']};
                dbname={$settings['DB_NAME']}",
                $settings['DB_USER'],
                $settings['DB_PASSWORD']
            );
            return self::$db;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function getDB() : PDO
    {
        return self::$db;
    }
}