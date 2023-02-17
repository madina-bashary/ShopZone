<?php 
include 'connect.php';
$id=$_GET['updateid'];
if(isset($_POST['submit_update'])){
  $name=$_POST['name'];
  $store_name=$_POST['store_name'];
  $number=$_POST['number'];
  $inovince=$_POST['inovince'];
  $price=$_POST['price'];
  $payed=$_POST['payed'];
  $rest=$_POST['rest'];
  $date=$_POST['date-man'];

    $sql="UPDATE `froshat` SET `barcode_id`='',`name_of_m`='',`type_of_m`='',`sell_price`='',`delivery_price`='',`material_amount`='',`date`='' WHERE 1";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data updated";
    }
    else{
        die(mysqli_error($con));
    }

}
?>