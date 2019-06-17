<?php
include_once '../validation.php';

class Database{
 
    // specify your own database credentials
    // private $host = "db5000040871.hosting-data.io";
    // private $db_name = "dbs35883";
    // private $username = "dbu88278";
    // private $password = "@hs_e&djr}tX9qWB";

    private $host = "localhost";
    private $db_name = "api_db";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>