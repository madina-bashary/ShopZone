<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ShoZpne Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- logo -->
  <link rel="shortcut icon" href="../Pictures/LOGO.png" type="image/x-icon">
  <!-- bootstrap link -->
  <link rel="stylesheet" href="../bootstrap_4/css/bootstrap-theme.css">
  <!-- rtl link -->
  <link rel="stylesheet" href="../bootstrap_4/css/rtl.css">
  <!-- icon -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- css link for all skins -->
  <link rel="stylesheet" href="../bootstrap_4/css/_all-skins.min.css">
  <!-- customize adminlite -->
  <link rel="stylesheet" href="../bootstrap_4/css/customize-adminlte.css">
  <!-- font awesome link -->
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- theme style -->
  <link rel="stylesheet" href="../bootstrap_4/css/AdminLTE.css">
  <!-- Jqurey link -->
  <script src="../bootstrap_4/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap JS link-->
  <script src="../bootstrap_4/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../bootstrap_4/js/adminlte.min.js"></script>
</head>

<body class="hold-transition skin-blue">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="Home.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">SZ</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>ShopZone Management System</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="Home.php" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
      </nav>
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-right image">
            <img src="../Pictures/profile.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-right info" style="margin-right: 7px; margin-top: 4px;">
            <p style="margin-bottom: 1px;">صدف عفت نوابی</p>
            <p>مدیر</p>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
           <!-- Buy link -->  
		  <li class="treeview">
        <a href="javascript: void(0)" style="margin-bottom: -15px;">
         <i class='fa fa-cart-arrow-down' style="margin-right: 8px;"></i>
          <span id="buy">خرید</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-right pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li style="padding-right:10px; margin-bottom: -11px;"><a href="Buy_Record.php">ثبت خرید</a></li>
          <li style="padding-right:10px;"><a href="Buy_View.php">فهرست خرید ها</a></li>
        </ul>
      </li>

      <!-- Sales link -->  
		  <li class="treeview">
        <a href="javascript: void(0)" style="margin-bottom: -15px;">
         <i class='fa fa-shopping-cart' style="margin-right: 7px;"></i>
          <span id="sales">فروشات</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-right pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li style="padding-right:10px; margin-bottom: -11px;"><a href="Sales_Record.php">ثبت فروشات</a></li>
          <li style="padding-right:10px;"><a href="Sales_View.php">فهرست فروشات</a></li>
        </ul>
      </li>

       <!-- Expense link -->  
		  <li class="treeview">
        <a href="javascript: void(0)" style="margin-bottom: -15px;">
         <i class='fa fa-dollar' style="margin-right: 9px;"></i>
          <span id="expense" style="margin-right: 5px;">مصارف</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-right pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu" id="masaref">
          <li style="padding-right:10px; margin-bottom: -11px;"><a href="Expenses_Record.php">ثبت مصارف</a></li>
          <li style="padding-right:10px;"><a href="Expenses_View.php">فهرست مصارف</a></li>
        </ul>
      </li>

      <!-- Acount link -->  
		  <li class="treeview">
            <a href="javascript: void(0)" style="margin-bottom: -15px;">
             <i class='fa fa-user'></i>
              <span id="account">حساب</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li style="padding-right:10px; margin-bottom: -11px;"><a href="Account_Record.php">ثبت حساب</a></li>
              <li style="padding-right:10px;"><a href="Account_View.php">فهرست حسابات</a></li>
            </ul>
      </li>

      <!-- Employee link -->  
		  <li class="treeview">
        <a href="javascript: void(0)" style="margin-bottom: -15px;">
         <i class='fa fa-users' style="margin-right: 5px;"></i>
          <span id="employee">کارمند</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-right pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li style="padding-right:10px; margin-bottom: -11px;"><a href="Employee_Record.php">ثبت کارمند</a></li>
          <li style="padding-right:10px;"><a href="Employee_View.php">فهرست کارمندان</a></li>
        </ul>
      </li>

      <!-- Payment link -->  
		  <li class="treeview">
        <a href="javascript: void(0)" style="margin-bottom: -15px;">
         <i class='fa fa-credit-card' style="margin-right: 5px;"></i>
          <span id="payment">پرداخت</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-right pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li style="padding-right:10px; margin-bottom: -11px;"><a href="Payment_Record.php">ثبت پرداخت</a></li>
          <li style="padding-right:10px;"><a href="Payment_View.php">فهرست پرداخت ها</a></li>
        </ul>
      </li>

      <!-- balance link -->  
		  <li class="treeview">
        <a href="Balance.php" style="margin-bottom: -15px;">
         <i class='fa fa-balance-scale' style="margin-right: 5px;"></i>
          <span id="balance" style="margin-right: 10px;">بلانس</span>
        </a>
      </li>

       <!-- Shop link -->  
		  <li class="treeview">
        <a href="javascript: void(0)" style="margin-bottom: -15px;">
         <i class='fa fa-university' style="margin-right: 4px;"></i>
          <span id="shop">دکان</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-right pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li style="padding-right:10px; margin-bottom: -11px;"><a href="Shop_Info_Record.php">ثبت دکان</a></li>
          <li style="padding-right:10px;"><a href="Shop_Info_View.php">فهرست دکاکین</a></li>
        </ul>
      </li> 

      <!-- setting link -->  
		  <li class="treeview">
        <a href="Setting.php" style="margin-bottom: -15px;">
         <i class='fa fa-cog' style="margin-right: 7px;"></i>
          <span id="setting" style="margin-right: 5px;">تنظیمات</span>
        </a>
      </li>
         
      </section>
      <!-- /.sidebar -->
    </aside>
  </div>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
      <iframe class="content" src="Home.php" frameborder="0" name="iframe" id="iframe"></iframe >
      <!-- /.content -->
  </div>
</body>
  <script>
    // iframe updating function
    $(document).ready(function(){
      $("a").click(function(e) {
        e.preventDefault();
        $("#iframe").attr("src", $(this).attr("href"));
      })
    });
    </script>

</html>