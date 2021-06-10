<?php
class Product{
    
    // database connection and table name
    private $conn;
    private $table_name = "register";
  
    // object properties
    public $id;
    public $rNickname;
    public $rEmail;
    public $rPassword;
    
  
    public function __construct($db){
        $this->conn = $db;

    }

    // create product
    function create(){

            echo "createUser";
        //write query
        $query = "INSERT INTO
                    " .$this->table_name. "
                SET
                    rNickname=:rNickname, rEmail=:rEmail, rPassword=:rPassword";
  
        $stmt = $this->conn->prepare($query);
        
        // posted values
        $this->rNickname=htmlspecialchars(strip_tags($this->rNickname));
        $this->rEmail=htmlspecialchars(strip_tags($this->rEmail));
        $this->rPassword=htmlspecialchars(strip_tags($this->rPassword));

        // bind values 
        $stmt->bindParam(":rNickname", $this->rNickname);
        $stmt->bindParam(":rEmail", $this->rEmail);
        $stmt->bindParam(":rPassword", $this->rPassword);
        
        $stmt->execute();
        $results = $stmt->fetchAll();

    
        if (isset($results)) {
           // echo json_encode($results);
            return true;
        } else {
           // $error = array('error_message' => 'Sorry, Charlie');
           // echo json_encode($error);
            return false;
        }
        }  
 }

?>