<?php

include 'connect.php';
 
if(isset($_POST['submit'])){
  $name = $_POST['acount_name'];
  $fnum = $_POST['first_number'];
  $snum = $_POST['second_number'];
  $address = $_POST['address'];
  $note = $_POST['note'];
  $date = $_POST['date-man'];

$sql="INSERT INTO `shop_info` (firstname, fnumber, snumber, shopaddress, note, `date`)
VALUES('$name',$fnum,$snum,'$address','$note', '$date')";
echo $sql;
$result= mysqli_query($con, $sql);
if($result){
  echo "data add";
}
else{
  die(mysqli_error($con));
}

}

?>

