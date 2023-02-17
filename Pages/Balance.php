
<?php 
//SELECT SUM(main_price) AS khared FROM `godam`....>sarmaya asli
//SELECT  SUM(amount * price) AS total  FROM `masaref`....> masraf rozmara
//SELECT SUM(sell_price) FROM `froshat`....>  majmo frosh
//SELECT  SUM(numbers) FROM `godam`....>agnas baqi manda
//SELECT SUM(sale_price) AS sale_price FROM froshat
//SELECT SUM(amount * price) AS  FROM masaref 
// SELECT SUM(salary)from sabt_karmand;
//SELECT SUM(salary)  FROM `pardakht_mash`
//SELECT SUM(total -payed)  FROM `sale_to_customer`
include 'connect.php';

//error_reporting(0);
if(isset($_GET["search"])) {
  $fromDate = $_GET["date-man"];
  $toDate = $_GET["to-date-man"];
    
  $query = mysqli_query($con, "SELECT SUM(total_price) AS khared FROM `godam` WHERE date BETWEEN '$fromDate' AND '$toDate'");
  $row = mysqli_fetch_assoc($query);
 

  $query_masaref = mysqli_query($con, "SELECT  SUM(amount * price) AS total  FROM `masaref` WHERE date BETWEEN '$fromDate' AND '$toDate'");
  $row_masaref = mysqli_fetch_assoc($query_masaref);

  $query_total_frosh = mysqli_query($con, "SELECT SUM(sell_price + delivery_price) AS total_frosh FROM froshat WHERE date BETWEEN '$fromDate' AND '$toDate'");
  $row_total_frosh = mysqli_fetch_assoc($query_total_frosh);

  $query_number_aqnas = mysqli_query($con, "SELECT  SUM(numbers) AS numbers FROM godam WHERE date BETWEEN '$fromDate' AND '$toDate'");
  $row_query_number_aqnas = mysqli_fetch_assoc($query_number_aqnas);

  
  $query_pardakht = mysqli_query($con, "SELECT SUM(salary) AS pardakht FROM pardakht_mash WHERE date BETWEEN '$fromDate' AND '$toDate'");
  $row_query_pardakht = mysqli_fetch_assoc($query_pardakht);

  $query_aqsad = mysqli_query($con, "SELECT SUM(total -payed) AS aqsad  FROM `sale_to_customer` WHERE date BETWEEN '$fromDate' AND '$toDate'");
  $row_query_aqsad = mysqli_fetch_assoc($query_aqsad);


} else {

  $query = mysqli_query($con, "SELECT SUM(total_price) AS khared FROM `godam` ");
  $row = mysqli_fetch_assoc($query);
 

  $query_masaref = mysqli_query($con, "SELECT  SUM(amount * price) AS total  FROM `masaref` ");
  $row_masaref = mysqli_fetch_assoc($query_masaref);

  $query_total_frosh = mysqli_query($con, "SELECT SUM(sell_price + delivery_price) AS total_frosh FROM froshat");
  $row_total_frosh = mysqli_fetch_assoc($query_total_frosh);

  $query_number_aqnas = mysqli_query($con, "SELECT  SUM(numbers) AS numbers FROM godam");
  $row_query_number_aqnas = mysqli_fetch_assoc($query_number_aqnas);

  
  $query_pardakht = mysqli_query($con, "SELECT SUM(salary) AS pardakht FROM pardakht_mash");
  $row_query_pardakht = mysqli_fetch_assoc($query_pardakht);

  $query_aqsad = mysqli_query($con, "SELECT SUM(total -payed) AS aqsad  FROM `sale_to_customer`");
  $row_query_aqsad = mysqli_fetch_assoc($query_aqsad);
  
  
  
}

?>
 <script> 
          
          function fayda_zarar(){
            var qarz_on_people = parseInt(document.getElementById("aqsad").value);
            var total_frosh = parseInt(document.getElementById("total_frosh").value);
            var kharid = parseInt(document.getElementById("kharid").value);
            var masaref = parseInt(document.getElementById("masaref").value);
            var pardakht = parseInt(document.getElementById("pardakht").value);
            var sod = parseInt(total_frosh - (kharid + masaref + pardakht));
            var total_investment = parseInt(kharid + qarz_on_people + sod );
            document.getElementById("damage").value
             = total_investment;

              var fayda = document.getElementById("fayda").value;
              var zarar = document.getElementById("zarar").value;
            if(sod>=0){
              fayda = sod;
              document.getElementById("fayda").value=fayda;
             
            }else{
              zarar=sod;
              document.getElementById("zarar").value=zarar;
              
            }
            }
         </script>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ShopZpne Management System / بلانس</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- logo -->
    <link rel="shortcut icon" href="../Pictures/LOGO.png" type="image/x-icon">
    <!-- CSS link -->
    <link rel="stylesheet" href="../CSS/Record.css">
    <!-- CSS view link -->
    <link rel="stylesheet" href="../CSS/View.css">
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="../bootstrap_4/css/bootstrap.min.css">
    <!-- bootstrap show link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap JS link-->
    <script src="../bootstrap_4/js/bootstrap.min.js"></script>
    <!-- graph link -->
    <script src="../bootstrap_4/js/Chart.js"></script>
    <!-- Jqurey link -->
    <script src="../bootstrap_4/jquery/dist/jquery.min.js"></script>
</head>

<style>
    label {
        color: white;
    }
</style>

<body style="background-color: #f7f0e8; padding: 30px 40px;" onload="fayda_zarar();">
    <!-- first row for title -->
    <div class="row" style="text-align: center;">
        <div class="col-md-12">
          <div class="titlebody">
            <div class="title">
              <span id="title">بلانس</span>
            </div>
          </div>
        </div>
    </div>

    <!-- graph -->
  <div class="chartCard" style="margin-bottom: 40px !important">
    <div class="chartBox col-md-10 col-sm-12" style="margin: auto; width: 100%; height: auto;">
      <canvas id="myChart"></canvas>
    </div>
  </div>


    <!-- second row for searching -->
    <div class="box box-info" id="box" style="margin-top: -25px !important;">
        
    <form action="" method="GET">

    <div class="box-header" style="margin-bottom: -25px !important;">
            <div class="row" id="search">
              <div class="btn-group col-md-8" style="float:left">
                <div class="col-md-6">
                   <label for="date-man">از تاریخ</label>
                  <input type="date" placeholder="از تاریخ" style="width: 100%; margin: 2px;" id="date-man">
                </div>
                <div class="col-md-6">
                  <label for="to-date-man">تا تاریخ</label>
                  <input type="date" placeholder="تا تاریخ" style="width: 100%; margin: 2px;" id="to-date-man">
               
              </div>
            </div>
            <div class="btn-group print" style="float:right; margin-left: 20px;" id="operations">
                <button type="submit" name="search" id="search" class="btn" style="background-color: #f1ae21;"><span class="fa fa-search" title="جستجو"></span></button>
            </div>
        </div>
    </div>
    </form>
    

    <!-- Main content -->
  <section class="content container-fluid" style="background-color: #1F4594; width: 100%; padding: 10px 20px; margin-bottom: 40px; margin-left: 0px !important;">
    <!-- second row for form content -->
   <div class="row">
     <div class="col-md-12">
       <form action="#" method="POST" style="padding: 12px;" class="needs-validation">
        <div class="row">
            <!-- first col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="damage">سرمایه کلی</label>
                <input type="text" class="form-control" id="damage" placeholder="سرمایه کلی" name="damage">
              </div>

              <div class="form-group">
                <label for="bought">خرید </label>
                <input type="text" value="<?php   do {  echo $row["khared"]; } while ($row = mysqli_fetch_assoc($query));?>"  class="form-control" id="kharid" placeholder="خرید" name="kharid">
              </div>

              <div class="form-group">
              <label for="remain">اجناس باقیمانده</label>
              <input type="text" value="<?php do { echo $row_query_number_aqnas["numbers"]; } while ($row_query_number_aqnas = mysqli_fetch_assoc($query_number_aqnas));?>" class="form-control" id="remain" placeholder="اجناس باقیمانده" name="remain">
            </div>
           </div>

           <div class="col-md-4">
                <div class="form-group">
                <label for="invest">مصرف کلی</label>
                <input type="text" value="<?php   do {    echo $row_masaref["total"]; } while ($row_masaref = mysqli_fetch_assoc($query_masaref));?>" class="form-control" id="masaref" placeholder="مصرف روزمره" name="masaref">
                </div>

                <div class="form-group">
                  <label for="revenue">پرداخت ها</label>
                  <input type="text" value="<?php do { echo $row_query_pardakht["pardakht"]; } while ($row_query_pardakht = mysqli_fetch_assoc($query_pardakht));?>" class="form-control" id="pardakht" placeholder="پرداخت ها" name="pardakht">
               </div>

               <div class="form-group">
              <label for="remain">ضرر</label>
              <input type="text" class="form-control" id="zarar" placeholder="ضرر" name="zarar">
            </div>
            </div>

            <!-- second col -->
           <div class="col-md-4">
            <div class="form-group">
              <label for="damage">اقصاد بالای مردم</label>
              <input type="text" value="<?php do { echo $row_query_aqsad["aqsad"]; } while ($row_query_aqsad = mysqli_fetch_assoc($query_aqsad));?>" class="form-control" name="aqsad" id="aqsad" placeholder="اقصاد بالای مردم" name="damage">
           
            </div>
              <div class="form-group">
                  <label for="revenue">فروشات</label>
                  <input type="text" value="<?php do { echo $row_total_frosh["total_frosh"]; } while ($row_total_frosh = mysqli_fetch_assoc($query_total_frosh));?>" class="form-control" id="total_frosh" placeholder="مجموع فروش" name="total_frosh">
            </div>
            <div class="form-group">
              <label for="sold">فایده</label>
              <input type="text" onload(); class="form-control" id="fayda" placeholder="فایده " name="fayda">
            </div>


          </div>

         </div>
       </form>
     </div>
   </div>
  </section>

  
       
            
          
  
  
</body>

<script>
   // graph codes 
   const data = {
      labels: ['سرمایه کلی', 'مصرف کلی', 'اقصاد بالای مردم', 'مجموع خرید', 'مجموع پرداخت ها', 'مجموع فروشات', 'تعداد اجناس باقیمانده', 'ضرر', 'فایده'],
      datasets: [{
        label: 'گراف توضیحات بلانس',
        data: [18, 12, 6, 9, 12, 3, 12, 10, 1],
        backgroundColor: [
          'rgba(54, 162, 255, 0.2)',
          'rgba(150, 75, 0, 0.2)',
          'rgba(219, 10, 184, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(75, 255, 192, 0.2)',
          'rgb(251, 219, 4, 0.2)',
          'rgba(252, 5, 5, 0.2)',
          'rgba(75, 255, 192, 0.2)'
        ],
        borderColor: [
          'rgba(54, 162, 255, 1)',
          'rgba(150, 75, 0, 1)',
          'rgba(219, 10, 184, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(75, 255, 192, 1)',
          'rgb(251, 219, 4, 1)',
          'rgba(252, 5, 5, 1)',
          'rgba(75, 255, 192, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

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