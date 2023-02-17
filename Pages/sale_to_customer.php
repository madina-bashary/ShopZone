
<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $store_name=$_POST['store_name'];
  $number=$_POST['number'];
  $inovince=$_POST['inovince'];
  $price=$_POST['price'];
  $payed=$_POST['payed'];
  $rest=$_POST['rest'];
  $date=$_POST['date-man'];
  

$sql="INSERT INTO `sale_to_customer`(`costumer_name`, `supermarketName`, `id_invice`, `total`, `payed`, `date`)
VALUES('$name','$store_name','$number','$inovince','$price', '$payed', '$date')";
$result=mysqli_query($con , $sql);
if($result){
 
  $name="";
  $store_name="";
  $number="";
  $inovince="";
  $price="";
  $payed="";
  $rest="";
  echo "data add";
}
else{
  die(mysqli_error($con));
}

}

?>