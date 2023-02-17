<?php 
function deleteAccount(){
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
}

function deletEmployee(){
    include 'connect.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $delet="DELETE FROM `sabt_karmand` WHERE id=$id";
    $result=mysqli_query($con, $delet);
    if($result){
        echo "data deleted";
    }
    else{
        die(mysqli_error($con));
    }
}
}

?>