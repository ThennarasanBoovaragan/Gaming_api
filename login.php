<?php session_start(); ?>
<?php
    include_once 'Database.php';
    
    include_once 'create_login.php'; 

    $database = new Database();

    $db = $database->getConnection();
    
    $login = new Login($db);
  
?>

<?php

 if($_POST){
         
         $login->email=  $_POST['email'];
         $login->password=  $_POST['password'];
         
         if($login-> create()){
             
             $message = "Successful Login";
         }
         else{
             
             $message = "User Login Failed";
         }
        
         $jwt =  "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93d3cub3hib3dnYW1pbmcuY29tIiwiYXVkIjoiaHR0cDpcL1wvd3d3Lm94Ym93Z2FtaW5nLmNvbSIsImlhdCI6MTM1Njk5OTUyNCwibmJmIjoxMzU3MDAwMDAwLCJkYXRhIjp7ImlkIjpudWxsLCJ1c2VybmFtZSI6IlNpdmFAMTIzNDU2IiwiZW1haWwiOiJTaXZhMTIzNDU2QGdtYWlsLmNvbSJ9fQ.O5hCDVEBXNTfhkDcc4eLMmTxN8_HOogyJLvtfOtTBD0";
        $freemoney = "1000.00";
        $wallet = "0.00";
        $rPoint = "0.00";
        $arr_data = array();
        
        $formdata = array(           
         'message'=>  $message,
         'jwt'=>  $jwt,
         'free_money' => $freemoney,
         'wallet' => $wallet,
         'reward_points'=> $rPoint,
         'email'=>  $_POST['rEmail'],
	   );

        
        array_push($arr_data,$formdata);
        
        $jsondata = json_encode($arr_data);
        
        file_put_contents($file, $jsondata);
        
        //header('Content-Type: application/json');
        echo $jsondata;  

       }

?>