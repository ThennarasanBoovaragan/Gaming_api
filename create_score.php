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
        //write query
        $query = "UPDATE ' . $this->$table_name . ' SET amount=' .$this->$amount. '
                WHERE
                     rNickname=:rNickname";
  
        $stmt = $this->conn->prepare($query);
  
        // posted values
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->rNickname=htmlspecialchars(strip_tags($this->rNickname));
  
        // bind values 
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":rNickname", $this->rNickname);
  
        if($stmt->execute()){
            return true;
        }else{
            return false;
       }
    }
 }

?>