<?php

class Database{
    
    private $host = "localhost";
    private $db_name = "infotech";
    private $username = "root";
    private $password = "root";
    private $port = "3307";
    public $conn;
    
    public function getConnection(){
        
        $this->conn = null;
        
        try{
            //$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn = new PDO("mysql:host=".$this->host.";port=3307;dbname=".$this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        
       // echo "connected";
        return $this->conn;
    }
    
}

//$conn=mysqli_connect("localhost","root","root","infotech","3307");
//
//if($conn){
//        echo "connected";
//    }else{
//     echo "connection failed";
//}

?>