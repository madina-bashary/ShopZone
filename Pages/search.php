
<?php
include 'connect.php';
$name = $_GET['str'];
$query = mysqli_query($con,"SELECT `id`,`salary`, `position` FROM `sabt_karmand` WHERE `name` = '$name'");
$row = mysqli_fetch_assoc($query);
echo "position".value=$row["position"];

//$rows = array(
//	"position" => $row["position"],
	//"salary" => $row["salary"],
//);
//$obj = json_encode($rows);
//echo $obj;

  //var pos = document.getElementById("position");
  //var sal = document.getElementById("salary");
  