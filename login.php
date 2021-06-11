<?php
    include_once 'Database.php';
    
    include_once 'create_login.php'; 

    $database = new Database();

    $db = $database->getConnection();
    
    $create_login = new create_login($db);
  
?>

<?php

 if($_POST){
         
         $create_login->rNickname=  $_POST['rNickname'];
         $create_login->rPassword=  $_POST['rPassword'];
         
         $email = $create_login->getEmail();
         if( $email == null){
             
        $message = "Login Failed: Invalid Email Address";
             
        $arr_data = array();
        
        $formdata = array(           
         'message'=>  $message,
	    );
        array_push($arr_data,$formdata);
        $jsondata = json_encode($arr_data);
        echo $jsondata;
        
         }
         else
         {
             if($create_login->create()){
             
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
         'rNickname'=>  $_POST['rNickname'],
         'rEmail'=> $email,
	   );

        
        array_push($arr_data,$formdata);
        
        $jsondata = json_encode($arr_data);
        
        //header('Content-Type: application/json');
        echo $jsondata;  
         }
       }

?>