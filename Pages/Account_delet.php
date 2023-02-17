<?php 
include 'connect.php';
if(isset($_GET['deletid'])){
    $id=$_GET['deletid'];
    $delet="DELETE FROM `acount` WHERE id=$id";
    $result=mysqli_query($con, $delet);
    if($result){
        echo "data deleted";
    }
    else{
        die(mysqli_error($con));
    }
}
?>