<?php 
include 'connect.php';
$id=$_GET['updateid'];
if(isset($_POST['submit_update'])){
    $name = $_POST['Emp_name'];
    $surname = $_POST['surname'];
    $fathername = $_POST['fathername'];
    $number = $_POST['number'];
    $salary = $_POST['salary'];
    $position = $_POST['position'];
    $date = $_POST['date-man'];
    $address=$_POST['address'];

    $sql="UPDATE `sabt_karmand` SET `firstname`='$name',`lastname`='$surname',`fathername`='$fathername',
   `phone`='$number',`salary`='$salary',`position`='$position',`date`='$date',`address`='$address' WHERE 1";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data updated";
    }
    else{
        die(mysqli_error($con));
    }

}
?>