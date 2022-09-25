<?php

namespace Database;

use PDO;
use PDOException;

class Database{


    public $host;
    public $db_name;
    public $username;
    public $password;
    public $pdo;

    public function __construct(string $db_name, string $host, string $username, string $password)
    {
        // Enregistrement des éléments en attribut
        $this->db_name = $db_name;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    public function getPDO(){
    
        //$this->conn = null;
    
        //try{
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password 
            ,[

                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
                ]);
        // }catch(PDOException $exception){
        //     "Connection error: " . $exception->getMessage();
        // }
    
        return $this->pdo;
        //var_dump($this->pdo);
    }
}
// $database = new Database();
// $db = $database->getConnection();
?>