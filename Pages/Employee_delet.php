<?php 
include 'connect.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $delet="DELETE FROM `sabt_karmand` WHERE id=$id";
    $result=mysqli_query($con, $delet);
    if($result){
        "setnull()";
    }
    else{
        die(mysqli_error($con));
    }
}
?>