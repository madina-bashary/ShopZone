
<?php
include 'connect.php';
$select = "SELECT `id`, `barcode`, `name_of_m`, `catagori_name`, `sales_price` FROM `godam`  ";
$sales_result=mysqli_query($con,$select);




?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم مدیریت فروشگاه / ثبت فروشات</title>
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
            <span id="title">ثبت فروشات</span>
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
              <label for="barcode">بارکود</label>
              <select name="barcode" id="barcode" class="form-control" required>
              <?php while($row=mysqli_fetch_array($sales_result)):; ?>
                <option value="<?php echo $row[0]; ?>" > <?php echo $row[1];?></option>
                <?php endwhile; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="name">نام جنس</label>
              <input type="text" class="form-control" id="name" placeholder="نام جنس" name="name" pattern = "^[a-zA-Zا-ی_ ]+$" required>
            </div>
          </div>

          <!-- second col -->
          <div class="col-md-4">
            <div class="form-group">
              <label for="type">کتگوری جنس</label> <br>
              <input type="text" class="form-control" id="type" placeholder="کتگوری جنس" name="type" pattern = "^[a-zA-Zا-ی_ ]+$" required>
            </div>

            <div class="form-group">
              <label for="amount">تعداد</label>
              <input type="number" class="form-control" id="amount" placeholder="تعداد" name="amount" pattern = "^[0-9۰-۹_ ]+$" required>
            </div>
          </div>

          <!-- third col -->
          <div class="col-md-4">
            <div class="form-group" style="position: relative;">
              <label for="price">قیمت</label>
              <input type="number" class="form-control" id="price" placeholder="قیمت" name="price" pattern = "^[0-9۰-۹_ ]+$" required>
            </div>

            <div class="form-group" style="position: relative;">
              <label for="delivery">کرایه راه</label>
              <input type="number" class="form-control" id="delivery" placeholder="کرایه راه" name="delivery" pattern = "^[0-9۰-۹_ ]+$" required>
             
            </div>
          </div>
        </div>

         <!-- button col -->
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="date-man">تاریخ</label>
              <input type="date" class="form-control" id="date-man" name="date-man" required>
            </div>
          </div>
           <div class="col-md-8">
              <button type="submit" class="btn saveBtn" type="button" id="submit-button" style="background-color: #1F4594; margin-top: 27px;">ذخیره شود</button>
           </div>
        </div>
       </form>
     </div>
   </div>
  </section>

<!-- query code for datepicker-->
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