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
}