<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم مدیریت فروشگاه / ثبت کارمند</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- logo -->
    <link rel="shortcut icon" href="../Pictures/LOGO.png" type="image/x-icon">
    <!-- CSS link -->
    <link rel="stylesheet" href="../CSS/Record.css">
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="../bootstrap_4/css/bootstrap.min.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="../bootstrap_4/css/rtl.css">
    <!-- Bootstrap JS link-->
    <script src="../bootstrap_4/js/bootstrap.min.js"></script>
    <!-- Jqurey link -->
    <script src="../bootstrap_4/jquery/dist/jquery.min.js"></script>
</head>
<script>
  function setnull(){
 document.getElementById["Emp_name"].value=null;
 document.getElementById["surname"].value=null;
 document.getElementById["fathername"].value=null;
 document.getElementById["number"].value=null;
 document.getElementById["salary"].value=null;
 document.getElementById["position"].value=null;
 document.getElementById["address"].value=null;
}
</script>

<?php

include 'connect.php';
 
if(isset($_POST['submit'])){
  $name = $_POST['Emp_name'];
  $surname = $_POST['surname'];
  $fathername = $_POST['fathername'];
  $number = $_POST['number'];
  $salary = $_POST['salary'];
  $position = $_POST['position'];
  $date = $_POST['date-man'];
  $address=$_POST['address'];

  $select = "SELECT * FROM `sabt_karmand` WHERE `firstname`='$name' AND `lastname`='$surname' AND `fathername`='$fathername' AND `phone`='$number' AND `salary`='$salary' AND `position`='$position' AND `date`='$date' ";
  $result=mysqli_query($con,$select);
  if(mysqli_num_rows($result)==1){
    
    alert("دیتا تکراری مجاز نیست");
    
  }
  else{
     
    $sql="INSERT INTO `sabt_karmand`(`firstname`, `lastname`, `fathername`, `phone`, `salary`, `position`, `date`, `address`)
    VALUES('$name','$surname','$fathername','$number','$salary','$position', '$date', '$address')";
    
    $result= mysqli_query($con, $sql);
    if($result){
       "setnull()";
    }
    else{
      die(mysqli_error($con));
    }
  }
}
?>

<body style="background-color: #f7f0e8; padding: 60px 40px;">
    <!-- Main content -->
   <section class="content container-fluid">
    <div class="row" style="text-align: center;">
      <div class="col-md-12">
        <div class="titlebody">
          <div class="title">
            <span id="title">ثبت کارمند</span>
          </div>
        </div>
      </div>
    </div>

    <!-- first row for form content -->
   <div class="row">
     <div class="col-md-12">
       <form action="#" method="POST" style="padding: 12px;" class="needs-validation">
         <div class="row">
           <!-- first col -->
           <div class="col-md-4">
            <div class="form-group">
              <label for="Emp_name">نام</label>
              <input type="text" class="form-control" id="Emp_name" placeholder="نام" name="Emp_name" minlength = "2" pattern = "^[ا-یa-zA-Z _]+$" required>
            </div>

            <div class="form-group">
                <label for="surname">تخلص</label>
                <input type="text" class="form-control" id="surname" placeholder="تخلص" name="surname" minlength = "2" pattern = "^[ا-یa-zA-Z _]+$" required>
            </div>

            <div class="form-group">
              <label for="fathername">نام پدر</label>
              <input type="text" class="form-control" id="fathername" placeholder="نام پدر" name="fathername" minlength = "4" pattern = "^[ا-یa-zA-Z _]+$" required>
            </div>
          </div>

          <!-- second col -->
          <div class="col-md-4">
            <div class="form-group">
              <label for="number">شماره تماس</label> <br>
              <input type="tel" class="form-control" id="number" placeholder="Phone Number" name="number" minlength="10" pattern="^[0-9۰-۹+]+$" required>
            </div>

            <div class="form-group" style="position: relative;">
                <label for="salary">معاش</label>
                <input type="number" class="form-control" id="salary" placeholder="معاش" name="salary" pattern="^[0-9۰-۹]+$" required>
            </div>

            <div class="form-group">
              <label for="position">وظیفه</label>
              <input type="text" class="form-control" id="position" placeholder="وظیفه" name="position" minlength = "4" pattern = "^[a-zA-Zا-ی_ ]+$" required>
            </div>
          </div>

          <!-- third col -->
          <div class="col-sm-4">
            <div class="form-group">
              <label for="date-man">تاریخ</label>
              <input type="date" class="form-control" id="date-man" name="date-man" required>
            </div>

            <div class="form-group">
              <label for="address">آدرس</label>
              <textarea class="form-control" name="address" id="address" cols="30" rows="4" style="padding-bottom: 20px;" placeholder="آدرس..." pattern = "^[a-zA-Z0-9۰-۹ا-ی_. ]+$" required></textarea>
            </div>
          </div>
          </div>

         <!-- button col -->
         <div class="row">
            <div class="col-md-12">
              <button   name="submit" type="submit" class="btn saveBtn" type="button" id="submit-button" style="background-color: #1F4594; margin-top: 27px;" >ذخیره شود</button>
             <!-- <input type='hidden' name='hidden'>-->
            </div>
          </div>
       </form>
     </div>
   </div>
 </section>
 <script>

 function setnull(){
        document.getElementById["Emp_name"].value=null;
        document.getElementById["surname"].value=null;
        document.getElementById["fathername"].value=null;
        document.getElementById["number"].value=null;
        document.getElementById["salary"].value=null;
        document.getElementById["position"].value=null;
        document.getElementById["address"].value=null;
       }

  // Disable form submissions if there are invalid fields
  (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Get the forms we want to add validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
</script>
</body>
</html>