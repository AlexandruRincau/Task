<?php

class Config{

    private const dbHost = 'localhost';
    private const dbUser = 'user';
    private const dbPass = 'password';
    private const dbName = 'task';

    private $dsn = 'mysql:host=' . self::dbHost . ';dbname=' . self::dbName . '';
    protected $conn = null;

    public function __construct(){
        try {
            $this->conn = new PDO($this->dsn, self::dbUser, self::dbPass);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }   

    }
}

?>


