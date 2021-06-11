
<?php
    include_once 'Database.php';
    
    include_once 'create_score.php'; 

    $database = new Database();

    $db = $database->getConnection();
    
    $create_score = new create_score($db);
  
?>

<?php

 if ($_POST){
         
         $create_score->Nickname =  $_POST['rNickname'];
         $create_score->amount =  $_POST['amount'];
         
         if($create_score->create()){
             
             $message = "Record Updated succesfully";
         }
         else{
             
             $message = "Record Update Failed";
         }
        
        $arr_data = array();
        
        $formdata = array( 
        'rNickname'=>  $_POST['rNickname'],    
         'message'=>  $message,
	   );

        array_push($arr_data,$formdata);
        $jsondata = json_encode($arr_data);
        echo $jsondata;  

       }

?>
