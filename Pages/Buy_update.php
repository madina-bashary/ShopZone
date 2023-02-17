<?php 
include 'connect.php';
$id=$_GET['updateid'];
if(isset($_POST['submit_update'])){
    $barcode=$_POST['barcode'];
    $item_name=$_POST['item_name'];
    $item_type=$_POST['item_type'];
    $amount=$_POST['amount'];
    $price=$_POST['price'];
    $delivery=$_POST['delivery'];
    $tax=$_POST['tax'];
    $total_price=$_POST['total_price'];
    $salse_price=$_POST['salse_price'];
    $price_per_item=$_POST['price_per_item'];
    $date=$_POST['date-man'];

    $sql="UPDATE `godam` SET `barcode`='$barcode',`name_of_m`='$item_name',`catagori_name`='$item_type',`numbers`='$amount',`main_price`='$price',
    `delivery_price`='$delivery',`tax`='$tax',`total_price`='$total_price',`sales_price`='$salse_price',`price_per_item`='$price_per_item',`date`='$date' WHERE 1";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data updated";
    }
    else{
        die(mysqli_error($con));
    }

}
?>