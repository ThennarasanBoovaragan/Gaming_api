<?php
include_once 'index.php';
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
            
             echo "<div class='alert alert-success'>User Was Created.</div>";
         }
         else{
             
             echo "<div class='alert alert-danger'>Unable to Create User.</div>";
         }        

       }

        
        $file = "data.json";
        $arr_data = array();
        
        $formdata = array(           
         'rNickname'=>  $_POST['rNickname'],
         'rEmail'=>  $_POST['rEmail'],
         'rPassword'=>  $_POST['rPassword'],
	   );

        
        array_push($arr_data,$formdata);
        
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

        
        if(file_put_contents($file, $jsondata)) {
	        echo 'Data successfully saved';
	    }
	   else {
	        echo "error";

        }
        
        //header('Content-Type: application/json');
        echo json_encode($jsondata);

?>
 
