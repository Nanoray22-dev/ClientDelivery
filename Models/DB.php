<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Config/config.php';

class Database {
    private $hostname;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct()
    {
     $this->hostname = HOST_NAME;
     $this->username = USER_NAME;
     $this->password = PASSWORD;
     $this->dbname = DB_NAME;
     try {
        $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
     } catch (PDOException $th) {
       echo $th->getMessage();
     }
     
     
    }

    function getConn(){
        return $this->conn;
    }
    function closeConn(){
        $this->conn = null;
    }
}

$DBCONN = new Database();
$DBCONN -> getConn();