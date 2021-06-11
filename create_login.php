  <?php
class create_login{
    
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
        $stmt->bindParam(":rEmail", $this->rEmail);
        $stmt->bindParam(":rPassword", $this->rPassword);
  
        $stmt->execute();
        $results = $stmt->fetchAll();

    
        if (isset($results)) {
            return true;
        } else {
            return false;
        }
    }
 }

?>