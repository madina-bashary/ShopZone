<?php 
include 'connect.php';
//error_reporting(0);
if(isset($_GET["search"])) {
  $fromDate = $_GET["date-man"];
  $toDate = $_GET["to-date-man"];
  $query = mysqli_query($con, "SELECT acount.id, firstname, lastname, username, email, password, age, phone, date FROM acount WHERE date BETWEEN '$fromDate' AND '$toDate'");
  $row = mysqli_fetch_assoc($query);
} else {
  $query = mysqli_query($con, "SELECT acount.id, firstname, lastname, username, email, password, age, phone,  date FROM acount ORDER BY acount.id DESC");
  $row = mysqli_fetch_assoc($query);
}

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ShopZone Management System / فهرست حسابات</title>
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
  <link rel="stylesheet" href="../bootstrap_4/js/xlsx.full.min.js">
  
</head>

<body style="background-color: #f7f0e8; padding: 60px 40px;">
   <!-- Main content -->
   <section class="content container-fluid" id="original-content">
    <!-- title -->
    <div class="row" style="text-align: center;">
        <div class="col-sm-12">
            <div class="titlebody">
               <div class="title">
                 <span id="title">فهرست حساب ها</span>
               </div>
            </div>
        </div>
    </div>

    <!-- page content-->
    <div class="box box-info" id="box">
        
        <div class="box-header">
            <!-- header for searching -->
        <form action="" method="GET">
        <div class="row" id="search">
              <div class="btn-group print" style="float:left">
                <div class="col-md-4">
                   <label for="date-man">از تاریخ</label>
                  <input type="date" value="<?php if(isset($_GET['date-man'])){echo $_GET['date-man'];}?>" placeholder="From Date" style="width: 100%; margin: 2px;" name="date-man" id="date-man">
              </div>
              <div class="col-md-4">
                  <label for="to-date-man">تا تاریخ</label>
                  <input type="date" value="<?php if(isset($_GET['to-date-man'])){echo $_GET['to-date-man'];}?>" placeholder="To Date" style="width: 100%; margin: 2px;"  name="to-date-man" id="to-date-man">
              </div>
              <div class="col-md-4">
                <label for="searchByName">تام</label>
                <input type="text" placeholder="Name" style="width: 100%; margin: 2px;" id="searchByName">
              </div>
              </div>
              <!-- button groups -->
              <div class="btn-group print" style="float:right; margin-left: 20px;" id="operations">
                  <button type="submit" name="search" id="search" class="btn" style="background-color: #f1ae21;"><span class="fa fa-search" title="جستجو"></span></button>
                 
                  <button class="btn" onclick="window.print();" style="background-color: #ff8c00;"><span class="fa fa-print" title="چاپ"></span></button>
                  <a href="Account_Record.php" class="btn btn-primary" title="ایجاد حساب جدید"><span class="fa fa-credit-card"></span></a>
                  <button class="btn btn-success" title="تبدیل به اکسل" onclick="ExportToExcel('xlsx');"><span class="fa fa-file-excel-o"></span></button>
              </div>
            </div>
        </form>
            
        </div>


        <!-- table -->
        <div class="box-body" style="overflow: hidden; overflow-x: auto;">
          <table id="account-table" class="table table-bordered table-striped col-sm-12" style="margin-bottom: 0px !important;">
            <!-- table header -->
            <thead>
              <tr>
                <th>آی دی</th>
                <th>نام</th>
                <th>تخلص</th>
                <th>نام کاربری</th>
                <th>ایمیل آدرس</th>
                <th>پسورد</th>
                <th>سن</th>
                <th>شماره تماس</th>
                <th>تاریخ</th>
                <th class="hidden-print">عملیات</th>
              </tr>
            </thead>
            <!-- table body -->
            <tbody>
            <?php do { ?>
              <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["firstname"] ?></td>
                    <td><?php echo $row["lastname"] ?></td>
                    <td><?php echo $row["username"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["password"] ?></td>
                    <td><?php echo $row["age"] ?></td>
                    <td><?php echo $row["phone"] ?></td>
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
   <script>
   

   <!-- print content -->
   <div id="print-content" class="col-md-5" style="margin: auto; visibility: hidden; text-align: center; color: #1F4594;">
        <img src="../Pictures/LOGO.png" alt="" id="img" width="150px" height="100px">
        <h1 style="font-size: 25px; font-weight: bold;">SHOP MIS ACCOUNT BILL</h1>
        <h3 style="font-size: 18px; margin-top: 5px;">Address: Afghanistan, Balkh, Mazar-e-sharif, Distric no.3</h3>
        <h3 style="font-size: 18px; margin-top: 5px;">Phone Numbers: 0775340478 - 0775340478</h3>
    </div>

</body>

<script>
function cancle(type, fn, dl) {
      //get a copy of table
     var elt = document.getElementById('account-table').cloneNode(true);
      // remove table header last cell
     elt.children[0].children[0].children[10].remove();
     //remove table body last cells
     let len = elt.rows.length - 1;
     for(let i = 0 ; i<len ; i++){
         elt.children[1].children[i].children[10].remove();
     }
    }




  function ExportToExcel(type, fn, dl) {
      //get a copy of table
     var elt = document.getElementById('account-table').cloneNode(true);
      // remove table header last cell
     elt.children[0].children[0].children[10].remove();
     //remove table body last cells
     let len = elt.rows.length - 1;
     for(let i = 0 ; i<len ; i++){
         elt.children[1].children[i].children[10].remove();
     }
     var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
     return dl ?
       XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
       XLSX.writeFile(wb, fn || ('حسابات_ثبت_شده.' + (type || 'xlsx')));
  }

  $(document).ready(function(){
        $('#searchByName').on("keyup", function(){
            var value=$(this).val().toLowerCase();
            $("#account-table tr").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value)> -1)
            });
        });
        
  });


</script>

</html>