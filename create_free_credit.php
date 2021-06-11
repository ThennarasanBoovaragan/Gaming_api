  <?php
class create_free_credit{
    
    // database connection and table name
    private $conn;
    private $table_name = "register";
  
    // object properties
    public $id;
    public $updateFreeCredit;
    public $rNickname;
//   public $timestamp;
  
    public function __construct($db){
        $this->conn = $db;
    }


    // create product
    function create(){
        //write query
        $query = "UPDATE register SET updateFreeCredit=:updateFreeCredit
                WHERE rNickname=:rNickname";
  
        $stmt = $this->conn->prepare($query);
  
        // posted values
        $this->updateFreeCredit=htmlspecialchars(strip_tags($this->updateFreeCredit));
        $this->rNickname=htmlspecialchars(strip_tags($this->rNickname));
  
        // bind values 
        $stmt->bindParam(":updateFreeCredit", $this->updateFreeCredit);
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