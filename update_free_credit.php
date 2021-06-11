<?php session_start(); ?>
<?php
    include_once 'Database.php';
    
    include_once 'create_free_credit.php'; 

    $database = new Database();

    $db = $database->getConnection();
    
    $create_free_credit = new create_free_credit($db);
  
?>

<?php

 if($_POST){
         
        $create_free_credit->updateFreeCredit=  $_POST['updatedFreeCredit'];
        $create_free_credit->rNickname=  $_POST['rNickname'];
         
         if($create_free_credit->create()){
             
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