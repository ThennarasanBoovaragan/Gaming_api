<?php

$connection=mysqli_connect("localhost","root","root","infotech","3307");

if($connection){
        echo "";
    }else{
     echo "connection failed";
} 


function Updatetable(){

   if (isset($_POST['submit'])){
    global $connection;
   
    $username=$_POST['username'];
    $tags=$_POST['tags'];
    $id=$_POST['id'];
 
    $query =" UPDATE updatescore SET username='".$username."' , tags='".$tags."' WHERE id='".$id."' ";
     $result=mysqli_query($connection,$query);
    if(!$result){
        die("Query Failed" . mysqli_error($connection));
   }else{
   echo "Score Updated";
   }
 }
}

function ShowAlldata(){
    
    global $connection;
    $query="SELECT * FROM updatescore";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die ('Query Failed'. mysqli_error($connection));
    }
    while($row= mysqli_fetch_assoc($result)){
       $id=$row['id'];
        echo"<option value='$id'>$id</option>";
    }
}

?>