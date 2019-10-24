<?php


class Conexion{
    
    private $host = 'localhost';
    private $dbName = 'veterinaria';
    private $userName = 'root';
    private $password = '';
    public $conn;
    
    function __construct()
    {
        $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName,$this->userName,$this->password);
        $this->conn->exec("SET NAMES 'uft8';");
    }
}













?>
