<?php

namespace Library\Core;

use \PDO;
use \PDOException;
use Library\Core\Utility;

class DB
{
    private ?PDO $db;

    // public function connect() : PDO | string
    // {
    //     $settings = Utility::readConfig('.env');
    //     try{
    //         $this->db = new PDO(
    //             "{$settings['DATABASE']}:host={$settings['DB_HOST']};
    //             port={$settings['DB_PORT']};
    //             dbname={$settings['DB_NAME']}",
    //             $settings['DB_USER'],
    //             $settings['DB_PASSWORD']
    //         );
    //         return $this->db;
    //     } catch(PDOException $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function __construct()
    {
        $settings = Utility::readConfig('.env');
        try{
            $this->db = new PDO(
                "{$settings['DATABASE']}:host={$settings['DB_HOST']};
                port={$settings['DB_PORT']};
                dbname={$settings['DB_NAME']}",
                $settings['DB_USER'],
                $settings['DB_PASSWORD']
            );
        } catch(PDOException $e) {
            $this->db = null;
        };
          
    }

    public function getDB() : PDO
    {
        return $this->db;
    }
}