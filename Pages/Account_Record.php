<!DOCTYPE html>
  <html lang="fa" dir="rtl">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>ShopZone Management System / ثبت حساب</title>
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
      <!-- title -->
      <div class="row" style="text-align: center;">
        <div class="col-md-12">
          <div class="titlebody">
            <div class="title">
              <span id="title">ثبت حساب</span>
            </div>
          </div>
        </div>
      </div>

      <!-- first row for form content -->
      <div class="row">
      <div class="col-md-12">
        <form action="acount_insertion.php" method="POST" style="padding: 12px;" class="needs-validation">
        <?php 
        if(isset($error)){
          foreach($error as $error){
            echo '<span class="error_msg">'.$error.'</span>';
          }
        }
        ?>
          <div class="row">
            <!-- first col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="acount_name">نام</label>
                <input type="text" class="form-control" id="acount_name" placeholder="نام" name="acount_name" minlength = "2" pattern = "^[ا-یa-zA-Z _]+$" required>
              </div>

              <div class="form-group">
                  <label for="surname">تخلص</label>
                  <input type="text" class="form-control" id="lastname" placeholder="تخلص" name="lastname" minlength = "2" pattern = "^[ا-یa-zA-Z _]+$" required>
              </div>

              <div class="form-group">
                <label for="userName">نام کاربری</label>
                <input type="text" class="form-control" id="username" placeholder="نام کاربری" name="username" minlength = "5" pattern = "^[ا-یa-zA-Z _]+$" required>
            </div>
            </div>

            <!-- second col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="email">ایمیل آدرس</label>
                <input type="email" class="form-control" id="email" placeholder="ایمیل آدرس" name="email" minlength = "13" pattern = "^[ا-یa-zA-Z0-9۰-۹_@.]+$" required>
              </div>

              <div class="form-group">
                <label for="password">پسورد</label>
                <input type="password" class="form-control" id="password" placeholder="پسورد" name="password" minlength = "8" pattern = "^[a-zا-یA-Z0-9۰-۹_%@!#$&]+$" required>
                <i id="togglePassword"></i>
              </div>

              <div class="form-group">
                <label for="age">سن</label> <br>
                <input type="number" class="form-control" id="age" placeholder="سن" name="age" min="18" max="99" pattern="^[0-9۰-۹]+$" required>
              </div>
            </div>

            <!-- third col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="number">شماره تماس</label> <br>
                <input type="tel" class="form-control" id="number" placeholder="شماره تماس" name="number" minlength="10" pattern="^[0-9۰-۹+ ]+$" required>
              </div>

              <div class="form-group">
                <label for="image">عکس</label>
                <input type="file" class="form-control" id="image" placeholder="عکس" name="image" style="padding-top:3px;" required>
              </div>
              
              <div class="form-group">
                <label for="date-man">تاریخ</label>
                <input type="date" class="form-control" id="date-man" name="date-man" required>
              </div>
            </div>
          </div>

          <!-- button row -->
          <div class="row">
            <div class="col-md-12">
              <button type="submit"  class="btn saveBtn" type="button" id="submit-button" name="submit"  style="background-color: #1F4594;">ذخیره شود</button>
            </div>
          </div>
          
        </form>
      </div>
      </div>
    </section>
  </body>

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

  </html>