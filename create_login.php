  <?php
class Login{
    
    // database connection and table name
    private $conn;
    private $table_name = "register";
  
    // object properties
    public $id;
    public $rEmail;
    public $rPassword;
//   public $timestamp;
  
    public function __construct($db){
        $this->conn = $db;
    }


    // create product
    function create(){
        //write query
        $query = "SELECT * FROM
                    ' . $this->$table_name . '
                WHERE
                     rEmail=:rEmail, rPassword=:rPassword";
  
        $stmt = $this->conn->prepare($query);
  
        // posted values
        $this->rEmail=htmlspecialchars(strip_tags($this->rEmail));
        $this->rPassword=htmlspecialchars(strip_tags($this->rPassword));
  
        // bind values 
        $stmt->bindParam(":email", $this->rEmail);
        $stmt->bindParam(":password", $this->rPassword);
  
        if($stmt->execute()){
            return true;
        }else{
            return false;
       }
    }
 }

?>