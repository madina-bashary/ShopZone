<?php 
include "connect.php";
$columns=array('id', 'barcode', 'name_of_m', 'catagori_name', 'numbers', 'main_price', 'delivery_price', 'tax', 'total_price','sales_price','price_per_item','date');
$query="SELECT * FROM godam WHERE ";
if($_POST["is_date_search"]==="yes"){
    $query.='date BETWEEN "'.$_POST["start_date"].'" AND  "'.$_POST["start_date"].'" AND';
}
if(isset($_POST["search"]["value"])){
    $query.='(id LIKE "%'.$_POST["search"]["value"].'%" OR barcode LIKE "%'.$_POST["search"]["value"].'%")';

}
if(isset($_POST["orser"])){
    $query.='ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}else{
    $query=.'ORDER BY id DESC';
    
}
$query1='';
if($_POST["length"] !=-1){
    $query1='LIMIT '.$_POST['start'].', '.$_POST['length'].' ';
}

$number_filter_row = mysqli_num_rows(mysqli_query($con, $query));
$result=mysqli_query($con, $query . $query1);
$date= array();
while($row= mysqli_fetch_array($result)){
    $sub_array=array();
    $sub_array[]=$row["id"];
    $sub_array[]=$row["barcode"];
    $sub_array[]=$row["catagori_name"];
    $sub_array[]=$row["numbers"];
    $sub_array[]=$row["main_price"];
    $sub_array[]=$row["delivery_price"];
    $sub_array[]=$row["tax"];
    $sub_array[]=$row["total_price"];
    $sub_array[]=$row["sales_price"];
    $sub_array[]=$row["price_per_item"];
    $sub_array[]=$row["date"];
    $date[]=$sub_array;

}
function get_all_data($con){
    $query= "SELECT * FROM godam";
    $result = mysqli_query($con, $query);
    return mysqli_num_rows($result);
}
$output = array(
    "draw"              =>intval($_POST["draw"]),
    "recordsTotal"      =>get_all_data($con),
    "recordsFiltered"   =>$number_filter_row,
    "data"              =>$data
);
echo json_encode($output);
?>