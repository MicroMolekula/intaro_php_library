<?php

namespace Library\Core;

use \PDO;
use Library\Core\DB;

class Model
{
    protected PDO $db;
    protected string $nameTable;
    protected mixed $data;

    private function initData() : void
    {
        $sql = "SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_NAME = '{$this->nameTable}'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $item) {
            $this->data[$item['column_name']] = '';
        }
    }

    public function __construct()
    {
        $this->db = (new DB())->getDB();
        if (!isset($this->data['id'])){
            $this->initData();
        }
    }

    public function __get(string $name) : mixed
    {
        return $this->data[$name];
    }

    public function __set(string $name, mixed $value) : void
    {
        $this->data[$name] = $value;
    }

    public function toArray() : array
    {
        return $this->data;
    }

    public function find(int $id) : Model | null
    {
        $sql = "SELECT * FROM {$this->nameTable} WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $result = $query->fetchObject(static::class);
        return $result ? $result : null;
    }

    public function all(string $filters = null) : array | null
    {
        $sql = "SELECT * FROM {$this->nameTable}";
        $sql = $filters ? $sql . " WHERE " . $filters : $sql;
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS, static::class);
        return $result ? $result : null;
    }

    public function delete(int $id, string $operator = '=') : bool
    {
        $sql = "DELETE FROM {$this->nameTable} WHERE id $operator :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        if($query->execute()) {
            return true;
        }
        return false;
    }

    public function save() : bool
    {
        $keys = array_keys($this->data);
        $sql = '';
        if ($this->data['id']) {
            $sql = "UPDATE {$this->nameTable} SET";
            foreach ($keys as $key){
                $sql .= $key != 'id' ? " $key = :$key," : '';
            }
            $sql = mb_substr($sql, 0, -1);
            $sql .= " WHERE id = :id";
        } else {
            $sql = "INSERT INTO {$this->nameTable} (";
            foreach ($keys as $key){
                $sql .= $key != 'id' ? " $key," : '';
            }
            $sql = mb_substr($sql, 0, -1) . ')';
            $sql .= " VALUES (";
            foreach ($keys as $key){
                $sql .= $key != 'id' ? " :$key," : '';
            }
            $sql = mb_substr($sql, 0, -1) . ')';
        }
        $query = $this->db->prepare($sql);
        foreach ($keys as $key) {
            if ($key != 'id') {
                $query->bindParam(":$key", $this->data[$key]);
            }
            if($key == 'id' && $this->data['id']) {
                $query->bindParam(":id", $this->data['id']);
            }
        }
        if ($query->execute()){
            return true;
        }
        return false;
    }
}