<?php 
include 'connect.php';
$id=$_GET['updateid'];
if(isset($_POST['submit_update'])){
  $name = $_POST['name'];
  $details = $_POST['details'];
  $price = $_POST['price'];
  $amount = $_POST['amount'];
  $date = $_POST['date-man'];

    $sql="UPDATE `masaref` SET `id_type`='$name',`discription`='$details',`amount`='$price',`price`='$amount',`date`='$date' WHERE 1";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data updated";
    }
    else{
        die(mysqli_error($con));
    }

}
?>