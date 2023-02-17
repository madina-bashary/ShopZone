<?php 
include 'connect.php';
error_reporting(0);
if(isset($_GET["search"])) {
  $fromDate = $_GET["date-man"];
  $toDate = $_GET["to-date-man"];
  $query = mysqli_query($con, "SELECT * FROM sabt_karmand WHERE date BETWEEN '$fromDate' AND '$toDate'");
  $row = mysqli_fetch_assoc($query);
} else {
  $query = mysqli_query($con, "SELECT * FROM sabt_karmand ORDER BY id DESC");
  $row = mysqli_fetch_assoc($query);
}


?>

<!DOCTYPE html>

<html lang="fa" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>سیستم مدیریت فروشگاه / فهرست کارمندان</title>
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
  <!-- Bootstrap rtl -->
  <link rel="stylesheet" href="../bootstrap_4/css/rtl.css">
  <!-- Fontawesome link -->
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- Jqurey link -->
  <script src="../bootstrap_4/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap JS link-->
  <script src="../bootstrap_4/js/bootstrap.min.js"></script>
  <!-- pop up -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Excel Converter -->
  <script type="text/javascript" src="../bootstrap_4/js/xlsx.full.min.js"></script>
</head>

<style>
  #table_body tr td button a:hover {
    text-decoration: none;
  }
</style>

<body style="background-color: #f7f0e8; padding: 60px 40px;">

   <!-- Main content -->
   <section class="content container-fluid">
    <div class="row" style="text-align: center;">
        <div class="col-sm-12">
            <div class="titlebody">
               <div class="title">
                 <span id="title">فهرست کارمندان</span>
               </div>
            </div>
        </div>
    </div>

    <!-- header for searching and buttons -->
    <div class="box box-info" id="box">
        <div class="box-header">
          <form action="" method="GET">
          <div class="row" id="search">
              <div class="btn-group print" style="float:left">
                <div class="col-md-4">
                   <label for="date-man">از تاریخ</label>
                  <input type="date" value="<?php if(isset($_GET['date-man'])){echo $_GET['date-man'];}?>" placeholder="از تاریخ" style="width: 100%; margin: 2px;"name="date-man" id="date-man">
              </div>
              <div class="col-md-4">
                  <label for="to-date-man">تا تاریخ</label>
                  <input type="date" value="<?php if(isset($_GET['to-date-man'])){echo $_GET['to-date-man'];}?>" placeholder="تا تاریخ" style="width: 100%; margin: 2px;" name="to-date-man" id="to-date-man">
              </div>
              <div class="col-md-4">
                <label for="searchByName">نام</label>
                <input type="text" placeholder="نام" style="width: 100%; margin: 2px;" id="searchByName">
              </div>
              </div>
              <div class="btn-group print" style="float:right; margin-left: 20px;" id="operations">
                  <button type="submit" name="search" class="btn" style="background-color: #f1ae21;"><span class="fa fa-search" title="جستجو"></span></button>
                  <button class="btn" onclick="window.print();" style="background-color: #ff8c00;"><span class="fa fa-print" title="چاپ"></span></button>
                  <a href="Employee_Record.php" class="btn btn-primary" title="ثبت کارمند جدید"><span class="fa fa-credit-card"></span></a>
                  <button class="btn btn-success" title="تبدیل به اکسل" onclick="ExportToExcel('xlsx');"><span class="fa fa-file-excel-o"></span></button>
              </div>
            </div>
          </form>
            
    </div>

        <!-- table -->
        <div class="box-body" style="overflow: hidden; overflow-x: auto;">
          <table id="employee-table" class="table table-bordered table-striped col-sm-12" style="margin-bottom: 0px !important;">
            <thead>
              <tr>
                <th>آی دی</th>
                <th>نام</th>
                <th>تخلص</th>
                <th>نام پدر</th>
                <th>شماره تماس</th>
                <th>معاش</th>
                <th>وظیفه</th>
                <th>تاریخ</th>
                <th>آدرس</th>
                <th class="print">عملیات</th>
              </tr>
            </thead>
            
            <tbody id="table_body">
            <?php do { ?>
              <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["firstname"] ?></td>
                    <td><?php echo $row["lastname"] ?></td>
                    <td><?php echo $row["fathername"] ?></td>
                    <td><?php echo $row["phone"] ?></td>
                    <td><?php echo $row["salary"] ?></td>
                    <td><?php echo $row["position"] ?></td>
                    <td><?php echo $row["date"] ?></td>
                    <td><?php echo $row["address"] ?></td>
                   
                 
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
  function ExportToExcel(type, fn, dl) {
      //get a copy of table
     var elt = document.getElementById('employee-table').cloneNode(true);
      // remove table header last cell
     elt.children[0].children[0].children[9].remove();
     //remove table body last cells
     let len = elt.rows.length - 1;
     for(let i = 0 ; i<len ; i++){
         elt.children[1].children[i].children[9].remove();
     }
     var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
     return dl ?
       XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
       XLSX.writeFile(wb, fn || ('کارمندان_ثبت_شده.' + (type || 'xlsx')));
  }

  $(document).ready(function(){
        $('#searchByName').on("keyup", function(){
            var value=$(this).val().toLowerCase();
            $("#employee-table tr").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value)> -1)
            });
        });
        
      });

</script>

</html>