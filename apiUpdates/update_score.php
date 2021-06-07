<?php 

$connection=mysqli_connect("localhost","root","root","infotech","3307");

if($connection){
        echo "";
    }else{
     echo "connection failed";
} 


?>
<br>
<?php include "create_score.php"; ?>
<br>
<?php Updatetable(); ?>
   
    <div class="container">
        <div class="col-sm-6">
           <h2 class="text-center">UPDATE</h2>
            <form action="update_score.php" method="post">
                <div class="form-group">
                 <label for="username">username</label> 
                 <input type="text" name="username" class="form-control">  
                </div>
               <br>
                <div class="form-group">
                 <label for="password">Tags</label> 
                 <input type="text" name="tags" class="form-control"> 
                </div>
                    <br>
                     <div class="form-group">
                     <select name="id"id="">
                     <?php
                         ShowAlldata();   
                         ?>
                     </select>
                     </div>
                     <br>
                <input class="btn btn-primary" type ="submit"name ="submit" value="UPDATE">
            </form>
        </div>  


