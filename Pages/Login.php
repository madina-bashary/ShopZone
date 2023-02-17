
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم مدیریت فروشگاه / ورود به سیستم</title>
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
    <!-- bootstrap show link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Bootstrap JS link-->
    <script src="../bootstrap_4/js/bootstrap.min.js"></script>
    <!-- Jqurey link -->
    <script src="../bootstrap_4/jquery/dist/jquery.min.js"></script>
</head>

<body style="background-color: #f7f0e8; padding: 60px 40px;">
    <!-- Main content -->
   <section class="content container-fluid">
    <!-- first row for title -->
    <div class="row" style="text-align: center;">
      <div class="col-md-12">
        <div class="titlebody">
          <div class="title">
            <span id="title">ورود به سیستم</span>
          </div>
        </div>
      </div>
    </div>

    <!-- second row for form content -->
   <div class="row">
     <div class="col-sm-12 col-md-4" style="margin: auto;">
       <form action="#" method="POST" style="padding: 12px;" class="needs-validation">
        <div class="row">
          <!-- second col -->
          <div class="col-md-12 col-sm-12">
            <div class="form-group" style="margin-top: -50px;">
                <img src="../Pictures/LOGO.png" alt="" style="margin: auto;" class="col-md-10 col-sm-12">
            </div>

            <div class="form-group">
              <label for="email/username">نام کاربری / ایمیل آدرس</label>
              <input type="text" class="form-control" id="username" placeholder="نام کاربری / ایمیل" name="username" pattern = "^[a-zA-Z۰-۹ا-ی0-9_@.]+$" required>
            </div>

            <div class="form-group" style="margin-top: -10px; margin-bottom: 20px;">
              <label for="password">پسورد</label>
              <input type="password" class="form-control" id="password" placeholder="پسورد" name="password" minlength = "8" pattern = "^[a-zA-Zا-ی0-۰-۹9_%@!#$&]+$" required>
              <i id="togglePassword"></i>
            </div>
          </div>
        </div>

        <!-- button row -->
        <div class="row">
            <div class="col-md-12 col-sm-12" style="padding: 5px 10px; margin-top: -1px; text-align: center;">
                <input type="submit" name="login" style="color: white; width: 97%;background-color: #1F4594; border-radius: 10px; " class="btn" value="ورود"></button> 
            </div>
        </div>
        
        
       </form> <br>
       <?php 
              include 'connect.php';

              if(isset($_POST['login'])){
                $user=$_POST['username'];
                $password=$_POST['password'];

                $select = "SELECT * FROM `acount` WHERE `username`='$user' AND `password`='$password'";
                $result=mysqli_query($con,$select);
                if(mysqli_num_rows($result)==1){
                  
                  $_SESSION['username']=$user;
                  $_SESSION['password']=$password;
                  header('location:Home.php');
                  
                }
                else{
                   
                  header('location:Login.php');
                }
              }
              
              ?>
   

       <!-- copyright msg -->
       <p style="color: gray; font-size: 13px; text-align: center;">&copy; Copyright 2022 by SHOP MIS team</p>
     </div>
   </div>
 </section>
<script>
        // for password visibility
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.getAttribute("type", type);
            // toggle the icon
            this.classList.toggle("bi-eye");
        })

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