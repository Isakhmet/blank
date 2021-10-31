<?php

class Database 
{
    private $connect;

    public function __construct()
    {
        $this->connect = new PDO('mysql:host=localhost;dbname=blank', 'user', 'password');
    }

    public function query($sql) 
    {
        return $this->connect->query($sql);
    }

    public function getLastId($sql)
    {
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();

        return $this->connect->lastInsertId();
    }

    public function deleteQuery($sql)
    {
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
    }
}