<?php

 $connection=mysqli_connect("localhost","root","root","infotech","3307");

if($connection){
        echo "connected";
    }else{
     echo "connection failed";
} 

?>
<?php session_start(); ?>

<?php 

     if(isset($_POST['submit'])){
         
         $rNickname=  $_POST['rNickname'];
         $rEmail    = $_POST['rEmail'];    
         $rPassword = $_POST['rPassword'];
         
      if(!empty($rEmail) && !empty($rPassword) && !empty($rNickname)){
          
      $rPassword = mysqli_real_escape_string($connection,$_POST['rPassword']);
      $rPassword = md5($rPassword);             
          
      if(preg_match('/^[\p{L} ]+$/u', $rNickname)) {
                
        $uppercase  = preg_match('@[A-Z]@', $rPassword);
        $lowercase  = preg_match('@[a-z]@', $rPassword);
        $number     = preg_match('@[0-9]@', $rPassword);
        $character  = preg_match('/[\'^£!$%&*()}{@#~?><>,|=_+-]/', $rPassword);
            
//        if($uppercase && $lowercase && $number && $character) {

        if(strlen($rPassword) >= 8) {
        
        $query = "INSERT INTO register (rNickname,rEmail,rPassword) ";
        $query .= "VALUES ('{$rNickname}','{$rEmail}','{$rPassword}') ";
             
        $register_user_query = mysqli_query($connection,$query);
      
        if(!$register_user_query) {
            
            die("Query Failed" . mysqli_error($connection) .' '. mysqli_error($connection));
        }
            
          $_SESSION['status'] = "Registration Was Successful Please Sign In";   
            
            header("Location:login.php"); 
           echo"User Created"; 
              
          }else{
              $message_strnpassworad = "password contain atleast 8 characters";
              
       }
            

          }else{
              $message_Nickname ="Only Alphabets are allowed in firstname";
          
       }
          
          }else{
			  $message = "Fields cannot be Empty";
       }  
         
          }else {         
              $message = ""; 
       }

  ?>
  
    <!-- Navigation  -->
<html>
<body> 
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0"> 
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
              </div>
              <p class="login-card-description">Register your account</p>
        
            <form role="form" action="register.php" method="post" id="login-form" autocomplete="on">
 
             
                <h6 class="text-center" style="color:#ff0000"><?php echo $message; ?></h6>
            
      
          <div class="form-group">
                <label for="title">Nickname</label>
                <input type="text" class="form-control" name="rNickname">
          </div>
                <h6 class="text-center" style="color:#ff0000"><?php echo $message_Nickname; ?></h6>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="rEmail" id="email" class="form-control" placeholder="somebody@example.com">
            </div>
                
            <div class="form-group">
                 <label for="password">Password</label>
                <input type="password" name="rPassword" id="password" class="form-control" placeholder="***********">
            </div>
                <h6 class="text-center" style="color:#ff0000"><?php echo $message_strnpassworad; ?></h6>
                <h6 class="text-center" style="color:#ff0000"><?php echo $message_password; ?></h6>
        
               <span class="input-group-btn">  
                  <input type="submit" name="submit" id="btn-login" class="btn btn-primary" value="Register">
              </span>
                
        </form> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </main> 
</body>
</html>
