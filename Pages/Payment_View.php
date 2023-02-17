<?php 
include 'connect.php';
error_reporting(0);
if(isset($_GET["search"])) {
  $fromDate = $_GET["date-man"];
  $toDate = $_GET["to-date-man"];
  $query = mysqli_query($con, "SELECT pardakht_mash.id, sabt_karmand.firstname as name_kar,sabt_karmand.position as posi,sabt_karmand.salary as salar, pardakht_mash.bardasht as bar, pardakht_mash.rest_amount as rest,explain_payment,pardakht_mash.date as date FROM pardakht_mash INNER JOIN sabt_karmand ON pardakht_mash.name_fk_sk=sabt_karmand.id WHERE pardakht_mash.date BETWEEN '$fromDate' AND '$toDate'");
  $row = mysqli_fetch_assoc($query);
} else {
  $query = mysqli_query($con, "SELECT pardakht_mash.id, sabt_karmand.firstname as name_kar,sabt_karmand.position as posi,sabt_karmand.salary as salar, pardakht_mash.bardasht as bar, pardakht_mash.rest_amount as rest,explain_payment,pardakht_mash.date as date FROM pardakht_mash INNER JOIN sabt_karmand ON pardakht_mash.name_fk_sk=sabt_karmand.id ORDER BY pardakht_mash.id DESC");
  $row = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>

<html lang="fa" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>سیستم مدیریت فروشگاه / فهرست پرداخت ها</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- logo -->
  <link rel="shortcut icon" href="../Pictures/LOGO.png" type="image/x-icon">
  <!-- CSS link -->
  <link rel="stylesheet" href="../CSS/View.css">
  <!-- CSS dialog box style -->
  <link rel="stylesheet" href="../cute-alert-master/style.css">
  <!-- Bootstrap CSS link -->
  <link rel="stylesheet" href="../bootstrap_4/css/bootstrap.min.css">
  <!-- Fontawesome link -->
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- Bootstrap rtl -->
  <link rel="stylesheet" href="../bootstrap_4/css/rtl.css">
  <!-- Jqurey link -->
  <script src="../bootstrap_4/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap JS link-->
  <script src="../bootstrap_4/js/bootstrap.min.js"></script>
  <!-- pop up -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Excel Converter -->
  <script type="text/javascript" src="../bootstrap_4/js/xlsx.full.min.js"></script>
</head>

<body style="background-color: #f7f0e8; padding: 60px 40px;">

   <!-- Main content -->
   <section class="content container-fluid">
    <div class="row" style="text-align: center;">
        <div class="col-sm-12">
            <div class="titlebody">
               <div class="title">
                 <span id="title">فهرست پرداخت ها</span>
               </div>
            </div>
        </div>
    </div>

    <!-- header for searching and buttons -->
    <div class="box box-info" id="box">
      <form action="" method="GET">
      <div class="box-header">
            <div class="row" id="search">
              <div class="btn-group print" style="float:left">
                <div class="col-md-4">
                   <label for="date-man">از تاریخ</label>
                  <input type="date" value="<?php if(isset($_GET['date-man'])){echo $_GET['date-man'];}?>" placeholder="از تاریخ" style="width: 100%; margin: 2px;" name="date-man" id="date-man">
              </div>
              <div class="col-md-4">
                  <label for="to-date-man">تا تاریخ</label>
                  <input type="date" value="<?php if(isset($_GET['to-date-man'])){echo $_GET['to-date-man'];}?>" placeholder="تا تاریخ" style="width: 100%; margin: 2px;"  name="to-date-man" id="to-date-man">
              </div>
              <div class="col-md-4">
                <label for="searchByName">نام</label>
                <input type="text" placeholder="نام" style="width: 100%; margin: 2px;" id="searchByName">
              </div>
              </div>
              <div class="btn-group print" style="float:right; margin-left: 20px;" id="operations">
                  <button type="submit" name="search" class="btn" style="background-color: #f1ae21;"><span class="fa fa-search" title="جستجو"></span></button>
                  <button class="btn" onclick="window.print();" style="background-color: #ff8c00;"><span class="fa fa-print" title="چاپ"></span></button>
                  <a href="Payment_Record.php" class="btn btn-primary" title="پرداخت جدید"><span class="fa fa-credit-card"></span></a>
                  <button class="btn btn-success" title="تبدیل به اکسل" onclick="ExportToExcel('xlsx');"><span class="fa fa-file-excel-o"></span></button>
                </div>
            </div>
        </div>

      </form>
        

    <!-- table -->
        <div class="box-body" style="overflow: hidden; overflow-x: auto;">
          <table id="payment-table" class="table table-bordered table-striped col-sm-12" style="margin-bottom: 0px !important;">
            <thead>
              <tr>
                <th>آی دی</th>
                <th>نام</th>
                <th>وظیفه</th>
                <th>معاش</th>
                <th>مقدار برداشت</th>
                <th>مقدار باقیمانده</th>
                <th>جزییات</th>
                <th>ناریخ</th>
                <th class="print">عملیات</th>
              </tr>
            </thead>
            <tbody>
            <?php do { ?>
              <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["name_kar"] ?></td>
                    <td><?php echo $row["posi"] ?></td>
                    <td><?php echo $row["salar"] ?></td>
                    <td><?php echo $row["bar"] ?></td>
                    <td><?php echo $row["rest"] ?></td>
                    <td><?php echo $row["explain_payment"] ?></td>
                    <td><?php echo $row["date"] ?></td>
                 
                  <td style='text-align: center;'><button class='btn btn-primary mr-3'><a href='#' style='color: white;'>Update</a></button>
                  <button class='btn btn-danger' onclick='window.confirm();'><a href='Account_delet.php?deletid=".$row[0]."' style='color: white;'>Delete</a></button></td>
               
                  </tr>
                  <?php } while ($row = mysqli_fetch_assoc($query)); ?>
          </tbody>
          </table>
         </div>
    </div>
   </section>
       
</body>

     

<script>
    $(document).ready(function(){
        $('#searchByName').on("keyup", function(){
            var value=$(this).val().toLowerCase();
            $("#payment-table tr").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value)> -1)
            });
        });
        
      });

      function ExportToExcel(type, fn, dl) {
      //get a copy of table
     var elt = document.getElementById('payment-table').cloneNode(true);
      // remove table header last cell
     elt.children[0].children[0].children[8].remove();
     //remove table body last cells
     let len = elt.rows.length - 1;
     for(let i = 0 ; i<len ; i++){
         elt.children[1].children[i].children[8].remove();
     }
     var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
     return dl ?
       XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
       XLSX.writeFile(wb, fn || ('پرداخت_های_ثبت_شده.' + (type || 'xlsx')));
  }
</script>

</html>