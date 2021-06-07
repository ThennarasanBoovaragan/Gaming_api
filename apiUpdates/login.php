<?php

 $connection=mysqli_connect("localhost","root","root","infotech","3307");

if($connection){
        echo "connected";
    }else{
     echo "connection failed";
} 

?>
<br>
<?php session_start(); ?>

<?php
    
    if(isset($_REQUEST['submit'])){
         
        $rEmail    = $_REQUEST['rEmail'];
        $rPassword = $_REQUEST['rPassword'];
                        
        $rPassword = mysqli_real_escape_string($connection,$_POST['rPassword']);
        $rPassword = md5($rPassword);  
    
        $query = "SELECT * FROM register WHERE rEmail = '{$rEmail}' ";
        $select_user_query = mysqli_query($connection, $query);
        
        if(!$select_user_query){
            
            die("Query Failed" . mysqli_error($connection));
            
        }
          
          while($row = mysqli_fetch_array($select_user_query)){
              
               $db_id = $row['user_id'];
               $db_rNickname = $row['rNickname'];
               $db_rEmail = $row['rEmail'];
               $db_rPassword = $row['rPassword'];              
          }
        
        
        if($rEmail === $db_rEmail){
        if($rPassword === $db_rPassword){
     
            
             $_SESSION['rEmail'] = $db_rEmail;
             $_SESSION['rNickname'] = $db_rNickname;

             //header("Location: ../code/admin");
           echo "login Suceesfully";
            
        }else{
            
            $message_password = "Incorrect password";
        }
         
        }else{
            $message_email = "Invalid email";   
              
        }
        
        }
   ?>  
       
       <html>
       <head>
       <title>Login</title>     
       
        <h3 class="" style="color:darkgreen"><p class="login-card-description">Sign In Into your account</p></h3> 
              
               <?php
                
                if(isset($_SESSION['status'])){
                    
                    echo $_SESSION['status'];
                }
                
                ?>
              
               <div class="card-body">
                <form action=""method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="rEmail" class="form-control" placeholder="Email address">
                </div>
                    <h6 class="text-center" style="color:#ff0000"><?php echo $message_email; ?></h6> 
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="rPassword" class="form-control" placeholder="***********">
                      
                  </div>
                     <h6 class="text-center" style="color:#ff0000"><?php echo $message_password; ?></h6> 
                
                  
                  <span class="input-group-btn">
                        <button class="btn btn-block login-btn mb-4" name="submit" type="submit" id ="submit">Login</button>
                  </span>
                </form>
                </div>
         </head>                 
       </html>