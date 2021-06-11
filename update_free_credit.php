<?php session_start(); ?>
<?php
    include_once 'Database.php';
    
    include_once 'create_free_credit.php'; 

    $database = new Database();

    $db = $database->getConnection();
    
    $login = new Login($db);
  
?>

<?php

 if($_POST){
         
         $login->email=  $_POST['updatedFreeCredit'];
         
         if($login-> create()){
             
             $message = "Balance Updated Succesfully";
         }
         else{
             
             $message = "Balance Update Failed";
         }
        
        
        $formdata = array(           
        'message'=>  $message,
        'UpdatedFreeCredit'=> $updatedFreeCredit,
         
	   );

        array_push($arr_data,$formdata);
        
        $jsondata = json_encode($arr_data);
        
        //header('Content-Type: application/json');
        echo $jsondata;  

       }

?>