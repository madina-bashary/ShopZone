<?php 
include 'connect.php';
$id=$_GET['updateid'];
if(isset($_POST['submit_update'])){
    $name=$_POST['name'];
    $position=$_POST['position'];
    $salary=$_POST['salary'];
    $withdraw=$_POST['withdraw'];
    $rest=$_POST['rest'];
    $date=$_POST['date-man'];
    $explain_bardasht=$_POST['explain'];

    $sql="UPDATE `pardakht_mash` SET `name_fk_sk`='$name',`position_fk_sk`='$position',`salary_fk_sk`='$salary',`bardasht`='$withdraw',`rest_amount`='$rest',`date`='$date',`explain_bardasht`='$explain_bardasht' WHERE 1";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "data updated";
    }
    else{
        die(mysqli_error($con));
    }

}
?>