<?php

namespace Library\Models;

use Library\Core\Model;
use Library\Core\DB;
use \PDO;

class Book extends Model
{
    function __construct()
    {
        $this->nameTable = "book";
        $this->db = DB::getDB();
    }

    public function selectAll() : array
    {
        $sql = "SELECT *  FROM {$this->nameTable}";
        $bookModel = $this->db->query($sql);
        $result = $bookModel->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function find(int $id) : array | bool
    {
        $sql = "SELECT *  FROM {$this->nameTable}";
        $bookModel = $this->db->query($sql);
        while($row = $bookModel->fetch(PDO::FETCH_ASSOC)){
            if($row['id'] == $id){
                return $row;
            }
        }
        return false;
    }
}