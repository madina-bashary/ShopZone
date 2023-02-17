<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم مدیریت فروشگاه / تنظیمات</title>
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
  <!-- Main content of backup -->
  <section class="content container-fluid" style="margin-bottom: 50px;">
    <!-- first row for title of backup -->
    <div class="row" style="text-align: center;">
      <div class="col-md-12">
        <div class="titlebody">
          <div class="title">
            <span id="title">تنظیمات</span>
          </div>
        </div>
      </div>
    </div>

    <!-- second row for form content of backup -->
   <div class="row">
     <div class="col-sm-12 col-md-8" style="margin: auto;">
       <form action="#" method="POST" style="padding: 12px;" class="needs-validation">
        <div class="row">
          <!-- first col -->
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label for="browser">Browser</label>
              <input type="text" class="form-control" id="browser" placeholder="Browser" name="browser" pattern = "^[a-zA-Zا-ی_]+$" required>
              <button class="btn" type="button" style="color: white; width: 100%;background-color: #1F4594; border-radius: 10px; margin-top: 15px;">Browser Button</button>
            </div>
          </div>

          <!-- second col -->
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label for="restore">Restore Back Up</label>
              <input type="text" class="form-control" id="restore" placeholder="Restore Back Up" name="restore" pattern = "^[a-zA-Zا-ی_]+$" required>
              <button class="btn" type="button" style="color: white; width: 100%;background-color: #1F4594; border-radius: 10px; margin-top: 15px;">Restore Back Up Button</button>
            </div>
          </div>
        </div>

        <!-- button row -->
        <div class="row">
            <div class="col-md-12 col-sm-12" style="padding: 5px 10px; text-align: center;">
                <button class="btn" style="color: white; width: 99%;background-color: #1F4594; border-radius: 10px;" type="button">Back Up</button>
            </div>
        </div>
       </form> 
     </div>
   </div> <br>
   
  </section>

  <!-- Main content of languages -->
  <section class="content container-fluid">
    <!-- first row for title of languages -->
    <div class="row" style="text-align: center;">
      <div class="col-md-12">
        <div class="titlebody">
          <div class="title">
            <span id="title">LANGUAGES / زبان ها</span>
          </div>
        </div>
      </div>
    </div>

    <!-- second row for form content of langueges  -->
   <div class="row">
     <div class="col-sm-12 col-md-8" style="margin: auto;">
       <form action="#" method="POST" style="padding: 12px;" class="needs-validation">
        <div class="row">
          <!-- first col -->
          <div class="col-md-6 col-sm-12" style="margin: auto;">
            <div class="form-group">
              <label for="langs">Languages / زبان ها</label>
              <select name="langs" id="langs" class="form-control" required>
                <option value="English" selected>English / انگلیسی</option>
                <option value="Persian">Persian / دری</option>
                <option value="Pashto">Pashto / پشنو</option>
              </select>
              <button class="btn" type="button" style="color: white; width: 100%;background-color: #1F4594; border-radius: 10px; margin-top: 15px;">Browser Button</button>
            </div>
          </div>
        </div>
       </form> 
     </div>
   </div> <br>
   
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