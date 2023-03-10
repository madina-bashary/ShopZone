
<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم مدیریت فروشگاه / صفحه اصلی</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- logo -->
    <link rel="shortcut icon" href="../Pictures/LOGO.png" type="image/x-icon">
    <!-- CSS link -->
    <link rel="stylesheet" href="../CSS/Record.css">
    <!-- CSS view link -->
    <link rel="stylesheet" href="../CSS/View.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
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
            <span id="title">فروش به مشتری</span>
          </div>
        </div>
      </div>
    </div>

    <!-- first row of form content -->
   <div class="row">
     <div class="col-md-12">
       <form action="sale_to_customer.php" method="POST" style="padding: 12px;" class="needs-validation">
          <div class="row">
            <!-- first col -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">نام مشتری</label>
                    <input type="text" class="form-control" id="name" placeholder="نام مشتری" name="name"  minlength = "2" pattern = "^[a-zA-Zا-ی_ ]+$" required>
                </div>

                <div class="form-group">
                    <label for="store_name">نام سوپر مارکیت</label>
                    <input type="text" class="form-control" id="store_name" placeholder="نام سوپر مارکیت" name="store_name"  minlength = "2" pattern = "^[a-zA-Zا-ی_ ]+$" required>
                  </div>
            </div>
            
            <!-- second col -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="number">شماره تماس</label> <br>
                    <input type="tel" class="form-control" id="number" placeholder="شماره تماس" name="number" minlength="10" pattern="^[0-9۰-۹+]+$" required>
                </div>

                <div class="form-group">
                    <label for="inovince">Inovince Number</label> <br>
                    <input type="text" class="form-control" id="inovince" placeholder="Inovince Number" name="inovince" pattern="^[0-9+]+$" required>
                </div>
            </div>

            <!-- third col -->
            <div class="col-md-3">
                <div class="form-group" style="position: relative;">
                    <label for="price">قیمت مجموعی</label>
                    <input type="number" class="form-control" id="price" placeholder="قیمت مجموعی" name="price" pattern="^[0-9۰-۹]+$" required>
                </div>

                <div class="form-group" style="position: relative;">
                    <label for="payed">پرداخت شده</label>
                    <input type="number" class="form-control" id="payed" placeholder="پرداخت شده" name="payed" pattern="^[0-9۰-۹]+$" required>
                </div>
            </div>

            <!-- fourth col -->
            <div class="col-md-3">
                <div class="form-group" style="position: relative;">
                    <label for="rest">باقی مانده</label>
                    <input type="number" class="form-control" id="rest" placeholder="باقی مانده" name="rest" pattern="^[0-9۰-۹]+$" required>
                </div>

                <div class="form-group">
                    <label for="date-man">تاریخ</label>
                    <input type="date" class="form-control" id="date-man" name="date-man" required>
                  </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="address">آدرس</label>
                    <input type="text" class="form-control" id="address" placeholder="آدرس" name="address" pattern = "^[a-zA-Zا-ی_ ]+$" required>
                </div>
            </div>
          </div>
       </form>
     </div>
   </div>
    </section>

    <!-- Godam content -->
   <section class="content container-fluid" style="margin-top: 50px;">
    <div class="row" style="text-align: center;">
        <div class="col-sm-12">
            <div class="titlebody">
               <div class="title">
                 <span id="title">فهرست گدام</span>
               </div>
            </div>
        </div>
    </div>

    <!-- table -->
    <div class="box box-info" id="box">
        <div class="box-header">
            <div class="row" id="search">
              <div class="btn-group print col-md-8" style="float:left">
                <div class="col-md-6">
                   <label for="date-man">جستجو به اساس بارکود</label>
                  <input type="text" placeholder="بارکود" style="width: 100%; margin: 2px;" id="barcode">
              </div>
              <div class="col-md-6">
                <label for="searchByName">جستجو به اساس نام</label>
                <select name="name" id="name" class="form-control" style="width: 100%; margin: 2px;">
                    <option value="" selected>جستجو به اساس نام</option>
                </select>
              </div>
              </div>
              <div class="btn-group print" style="float:right; margin-left: 20px;" id="operations">
                  <button class="btn" style="background-color: #f1ae21;"><span class="fa fa-search" title="جستجو"></span></button>
                  <button class="btn" onclick="window.print();" style="background-color: #ff8c00;"><span class="fa fa-print" title="چاپ"></span></button>
              </div>
            </div>
    </div>

        <div class="box-body" style="overflow: hidden; overflow-x: auto;">
          <table id="buy-table" class="table table-bordered table-striped col-sm-12" style="margin-bottom: 0px !important;">
            <thead>
              <tr>
                <th>آی دی</th>
                <th>بارکود</th>
                <th>نام جنس</th>
                <th>کتگوری جنس</th>
                <th>نعداد</th>
                <th>قیمت فروش</th>
                <th>قیمت مجموعی</th>
                <th>تاریخ</th>
              </tr>
            </thead>
            <tbody>
            <tbody>
                <?php
                $select_godam="SELECT id, barcode, name_of_m, catagori_name, numbers,  delivery_price,  total_price, sales_price, price_per_item, 'date' FROM godam";
                $godam_result=mysqli_query($con,$select_godam);
                if($godam_result){
                while($row=mysqli_fetch_assoc($godam_result)){
                    $id=$row['id'];
                    $barcode = $row['barcode'];
                    $name_of_m = $row['name_of_m'];
                    $catagori_name = $row['catagori_name'];
                    $price_per_item = $row['price_per_item'];
                    $date=$row['date'];
                    $mount="1";
                    echo'
                    <tr>
                    <td>'.$id.'</td>
                    <td><input type="text" value="'.$barcode.'" ></td>
                    <td><input type="text" value="'.$name_of_m.'" ></td>
                    <td><input type="text" value="'.$catagori_name.'" ></td>
                    <td><input type="text" value="'.$mount.'" ></td>
                    <td><input type="text" value="'.$price_per_item.'" ></td>
                    <td><input type="text" value="'.$price_per_item.'" ></td>
                    <td><input type="text" value="'.$date.'" ></td>
                    </tr>';
                  }
                 }
             
             ?>
                   
            
          </tbody>
          </table>
         </div>
    </div>
   </section>

   <!-- button row -->
   <div class="row" style="margin-top: 10px; margin-left: 5px;">
        <div class="col-md-6">
            <button name="submit" type="submit" class="btn saveBtn" type="button" id="submit-button" style="background-color: #1F4594; width: 98%;">ذخیره شود</button>
        </div>

        <div class="col-md-6">
            <button type="reset" class="btn saveBtn" type="button" id="reset-button" style="background-color: #1F4594; width: 98%;">ذخیره نشود</button>
        </div>
    </div>
</body>
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
</html>