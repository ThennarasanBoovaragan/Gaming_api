<?php
class create_login{
    
    // database connection and table name
    private $conn;
    private $table_name = "register";
  
    // object properties
    public $rNickname;
    public $rPassword;
    public $rEmail;

  
    public function __construct($db){
        $this->conn = $db;
    }


    // create product
    function create(){
        
        //write query
        $query = "SELECT * FROM
                    " .$this->table_name. "
                WHERE
                     rNickname=:rNickname,rPassword=:rPassword";
  
        $stmt = $this->conn->prepare($query);
        
        $this->rNickname=htmlspecialchars(strip_tags($this->rNickname));
        $this->rPassword=htmlspecialchars(strip_tags($this->rPassword));
        
        $stmt->bindParam(":rNickname", $this->rNickname);
        $stmt->bindParam(":rPassword", $this->rPassword);
    
        $stmt->execute();
        
        $result = $stmt->fetchAll();

        if (isset($result)) {
            return true;
        } else {
            return false;
        }
    }
    
    function getEmail(){
        
                $query = "SELECT rEmail FROM
                    " .$this->table_name. "
                WHERE
                     rNickname=:rNickname";
                $stmt = $this->conn->prepare($query); 
                $stmt->bindParam(":rNickname", $this->rNickname);

                $stmt->execute();
                
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->rEmail = $row['rEmail'];
                return $this->rEmail;
    }
    
 }

?>