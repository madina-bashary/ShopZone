<?php 
include 'connect.php';
if(isset($_GET['deleting'])){
    $id=$_GET['deleting'];
    $delet="DELETE FROM `froshat` WHERE id=$id";
    $result=mysqli_query($con, $delet);
    if($result){
        echo "data deleted";
    }
    else{
        die(mysqli_error($con));
    }
}
?>