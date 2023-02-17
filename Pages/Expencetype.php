<?php

include 'connect.php';
 
if(isset($_POST['Add'])){
  $name = $_POST['expense'];
 
  $select = "SELECT * FROM `masaref_type` WHERE `name_masraf`='$name'";
  $result=mysqli_query($con,$select);
  if(mysqli_num_rows($result)==1){
    
   echo 'duplex data';
    
  }
  else{
     
    $sql="INSERT INTO `masaref_type`(`name_masraf`)VALUES('$name')";
echo $sql;
$result= mysqli_query($con, $sql);
if($result){
  header('location:Expenses_Record.php');
}
else{
  die(mysqli_error($con));
}
  }


}

?>