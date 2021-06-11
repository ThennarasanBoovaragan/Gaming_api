<?php session_start(); ?>
<?php
    include_once 'Database.php';
    
    include_once 'create_score.php'; 

    $database = new Database();

    $db = $database->getConnection();
    
    $create_score = new create_score($db);
  
?>

<?php

 if (isset($_POST['submit'])){
         
         $create_score->rNickname=  $_POST['rNickname'];
         $create_score->amount=  $_POST['amount'];
         
         if($create_score->create()){
             
             $message = "Record Updated succesfully";
         }
         else{
             
             $message = "Record Update Failed";
         }
        
        $arr_data = array();
        
        $formdata = array( 
        'rEmail'=>  $_POST['rEmail'],    
         'message'=>  $message,
	   );

        array_push($arr_data,$formdata);
        $jsondata = json_encode($arr_data);
        echo $jsondata;  

       }

?>

<br>
   
    <div class="container">
        <div class="col-sm-6">
           <h2 class="text-center">UPDATE</h2>
            <form action="update_score.php" method="post">
                <div class="form-group">
                 <label for="amount">Amount</label> 
                 <input type="text" name="amount" class="form-control">  
                </div>
                <div class="form-group">
                 <label for="rNickname">Nickname</label> 
                 <input type="text" name="amount" class="form-control">  
                </div>
                <input class="btn btn-primary" type ="submit"name ="submit" value="UPDATE">
            </form>
        </div>  
