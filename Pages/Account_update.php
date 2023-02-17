<?php 
include 'connect.php';
$id=$_GET['updateid'];
if(isset($_POST['submit_update'])){
    $name = $_POST['acount_name'];
    $lastname = $row['lastname'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $age = $row['age'];
    $phone=$row['number'];
    $date=$row['date-man'];

    $sql="UPDATE `acount` SET `firstname`='$name',`lastname`='$lastname',`username`='$username',`email`='$email',`password`='$password',`age`='$age',`phone`='$phone',`date`='$date' WHERE id='$id'";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data updated";
    }
    else{
        die(mysqli_error($con));
    }

}
?>