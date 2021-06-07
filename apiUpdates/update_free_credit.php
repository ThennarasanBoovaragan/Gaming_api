<?php //include "Database.php"; 

$connection=mysqli_connect("localhost","root","root","infotech","3307");

if($connection){
        echo "";
    }else{
     echo "connection failed";
} 


?>
<br>
<?php include "create_free_credit.php"; ?>
<br>
<?php Updatetable(); ?>
   
    <div class="container">
        <div class="col-sm-6">
           <h2 class="text-center">UPDATE</h2>
            <form action="update_free_credit.php" method="post">
                <div class="form-group">
                 <label for="password">Addamount</label> 
                 <input type="text" name="addAmt" class="form-control"> 
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

