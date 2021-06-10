<?php
    //include_once 'index.php';
    include_once 'Database.php';
    
    include_once 'Product.php'; 

    $database = new Database();

    $db = $database->getConnection();
    
    $product = new Product($db);


// set page headers
$page_title = "Create Users";
  
  
?>

<?php

 if($_POST){
         
         $product->rNickname=  $_POST['rNickname'];
         $product->rEmail=  $_POST['rEmail'];
         $product->rPassword=  $_POST['rPassword'];
         
         if($product->create()){
            
             $message = "User Created";
         }
         else{
             
             $message =  "Unable to Create User";
         }        


        $jwt =  "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93d3cub3hib3dnYW1pbmcuY29tIiwiYXVkIjoiaHR0cDpcL1wvd3d3Lm94Ym93Z2FtaW5nLmNvbSIsImlhdCI6MTM1Njk5OTUyNCwibmJmIjoxMzU3MDAwMDAwLCJkYXRhIjp7ImlkIjpudWxsLCJ1c2VybmFtZSI6IlNpdmFAMTIzNDU2IiwiZW1haWwiOiJTaXZhMTIzNDU2QGdtYWlsLmNvbSJ9fQ.O5hCDVEBXNTfhkDcc4eLMmTxN8_HOogyJLvtfOtTBD0";
        $freemoney = "1000.00";
        $wallet = "0.00";
        $rpoint = "0.00";
        $arr_data = array();
        
        $formdata = array(           
         'message'=>  $message,
         'jwt'=>  $jwt,
         'free_money' => $freemoney,
         'wallet' => $wallet,
         'rNickname'=>  $_POST['rNickname'],
         'rPoint'=> $rpoint,
         'rEmail'=>  $_POST['rEmail'],
	   );

        
        array_push($arr_data,$formdata);
        
        $jsondata = json_encode($arr_data);
        
        file_put_contents($file, $jsondata);
        
        //header('Content-Type: application/json');
        echo $jsondata;
 }
?>
 
