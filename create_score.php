  <?php
class create_score{
    
    // database connection and table name
    private $conn;
    private $table_name = "register";
  
    // object properties
    public $id;
    public $amount;
    public $rNickname;
  
    public function __construct($db){
        $this->conn = $db;
    }


    // create product
    function create(){
        
        echo "Create_score called";
        //write query
        $query = "UPDATE register SET amount=:amount
                WHERE rNickname=:rNickname";
  
        $stmt = $this->conn->prepare($query);
  
        // posted values
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->rNickname=htmlspecialchars(strip_tags($this->rNickname));
  
        // bind values 
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":rNickname", $this->rNickname);
  
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