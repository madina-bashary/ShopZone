<?php 
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم مدیریت فروشگاه / ثبت دکان</title>
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



<body style="background-color: #f7f0e8; padding: 60px 40px;">
    <!-- Main content -->
   <section class="content container-fluid">
    <div class="row" style="text-align: center;">
      <div class="col-md-12">
        <div class="titlebody">
          <div class="title">
            <span id="title">ثبت دکان</span>
          </div>
        </div>
      </div>
    </div>

    <!-- first row of form content -->
   <div class="row">
     <div class="col-md-12">
       <form action="shop-info.php" method="POST" style="padding: 12px;" class="needs-validation">
         <div class="row">
           <!-- first col -->
           <div class="col-md-4">
            <div class="form-group">
              <label for="acount_name">نام</label>
              <input type="text" class="form-control" id="acount_name" placeholder="نام" name="acount_name" minlength = "4" pattern = "^[a-zA-Zا-ی_ ]+$" required>
            </div>

            <div class="form-group">
              <label for="first_number">شماره تماس ۱</label>
              <input type="tel" class="form-control" id="first_number" placeholder="شماره تماس ۱" name="first_number" minlength="10" pattern="^[0-9۰-۹+]+$" required>
            </div>
          </div>

          <!-- second col -->
          <div class="col-md-4">
            <div class="form-group">
              <label for="second_number">شماره تماس ۲</label>
              <input type="tel" class="form-control" id="second_number" placeholder="شماره تماس ۲" name="second_number" minlength="10" pattern="^[0-9۰-۹+]+$" required>
          </div>

          <div class="form-group">
            <label for="address">آدرس</label>
            <input type="text" class="form-control" id="address" placeholder="آدرس.." name="address" pattern = "^[a-zA-Zا-ی0-9۰-۹_. ]+$" required>
          </div>
          </div>

          <!-- third col -->
          <div class="col-md-4">
            <div class="form-group">
              <label for="note">نوت</label> <br>
              <input type="text" class="form-control" id="note" placeholder="نوت...." name="note" pattern = "^[a-zA-Zا-ی۰-۹0-9_. ]+$" required>
            </div>
            
            <div class="form-group">
              <label for="date-man">تاریخ</label>
              <input type="date" class="form-control" id="date-man" name="date-man" required>
            </div>
          </div>
         </div>

         <!-- button col -->
         <div class="row">
           <div class="col-md-12">
              <button type="submit" class="btn saveBtn" type="button" id="submit-button" name="submit"  style="background-color: #1F4594; margin-top: 27px;">ذخیره شود</button>
          </div>
         </div>
       </form>
     </div>
   </div>
 </section>
<script>

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