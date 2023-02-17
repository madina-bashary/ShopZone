
<?php
include 'connect.php';
$select = "SELECT `id`,`firstname` FROM `sabt_karmand` ";
  $s_result=mysqli_query($con,$select);

  // when firstname option chose we fill position and salary....
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $position=$_POST['position'];
  $salary=$_POST['salary'];
  $withdraw=$_POST['withdraw'];
  $rest=$_POST['rest'];
  $date=$_POST['date-man'];

  $select = "SELECT * FROM pardakht_mash WHERE name_fk_sk='$name' AND 'date'='$date'";
        $result=mysqli_query($con,$select);
        if(mysqli_num_rows($result)==1){
          
          alert("دیتای تکراری مجاز نیست");
          
        }
        else{
            
          $sql="INSERT INTO pardakht_mash( name_fk_sk, position, salary, bardasht, rest_amount, 'date', explain_bardasht)
          VALUES('$name','$position','$salary','$withdraw','$rest', '$date')";
          echo $sql;
          $result=mysqli_query($con , $sql);
          if($result){
            alert( "data add");
          }
          else{
            //die(mysqli_error($con));
            alert("not save");
          }
        }


  
  }


  
?>
<script>
function posi(){
  
    <?php 
    if(isset($_POST['name'])){
      $name=$_POST['name'];
  
    $select = "SELECT * FROM `sabt_karmand` 
     WHERE `id`='$name' ";
    $s_result=mysqli_query($con,$select);
    $roww=mysqli_fetch_row($s_result);
    echo $roww["position"];
    ?>
   // document.getElementById("position").value=<?php echo $roww["position"];?>
   // document.getElementById("salary").value=<?php echo $roww["salary"];?>
      
  <?php } ?>
  }
  
  </script>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم مدیریت فروشگاه / پرداخت معاش</title>
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
            <span id="title">ثبت پرداخت معاش</span>
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
              <label for="name">نام</label>
              <select name="name" id="name"  class="form-control" onchange="getUser(this.value)">
               
              <?php while($row=mysqli_fetch_array($s_result)):; ?>
                <option  name="pls"value="<?php echo $row[0]; ?>"><?php echo $row[1];?> </option>
                <?php
              endwhile; 
              //onchange="getUser(this.value)"
                ?>
              </select>
            </div>
         
         
            <div class="form-group">
                <label for="position">وظیفه</label>
               
                <input type="text" class="form-control" id="position" placeholder="وظیفه" name="position" minlength = "4" pattern = "^[a-zA-Zا-ی_ ]+$" required > 
                
                
              </div>


              <div class="form-group" style="position: relative;">
                <label for="salary">معاش</label>
                <input type="number" value="<?php echo $row["salary"]; ?>" class="form-control" id="salary" placeholder="معاش" name="salary" pattern="^[0-9۰-۹]+$" required>
            </div>
          </div>
          
          

          <!-- second col -->
          <div class="col-md-4">
            <div class="form-group" style="position: relative;">
                <label for="withdraw">مقدار برداشت</label>
                <input type="number" class="form-control" id="withdraw" placeholder="مقدار برداشت" name="withdraw" pattern="^[0-9۰-۹]+$" required>
            </div>

            <div class="form-group" style="position: relative;">
                <label for="rest">مقدار باقیمانده</label>
                <input type="number" class="form-control" id="rest" placeholder="مقدار باقیمانده" name="rest" pattern="^[0-9۰-۹]+$" required>
            </div>

            <div class="form-group">
                <label for="date-man">تاریخ</label>
                <input type="date" class="form-control" id="date-man" name="date-man" required>
              </div>
          </div>

          <!-- third col -->
          <div class="col-md-4">
            <div class="form-group">
                <label for="explain">جزییات</label> <br>
                <textarea class="form-control" name="explain" id="explain" cols="30" rows="7" style="padding-bottom: 20px;" placeholder="جزییات..." pattern = "^[۰-۹a-zA-Zا-ی0-9_. ]+$" required></textarea>
            </div>
          </div>
         </div>

         <!-- button col -->
         <div class="row">
            <div class="col-md-12">
              <button type="submit" class="btn saveBtn" type="button" id="submit-button" style="background-color: #1F4594; margin-top: 27px;">ذخیره شود</button>
            </div>
          </div>
       </form>
     </div>
   </div>
  </section>


  <script>
        function setnull(){
        document.getElementById["position"].value=null;
        document.getElementById["salary"].value=null;
        document.getElementById["explain"].value=null;
      
       }

       var pos = document.getElementById("position");
            var sal = document.getElementById("salary");

            function getUser(str) {
              var xhr = new XMLHttpRequest();
              xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        var res = JSON.parse(xhr.response);
                        pos.value = res["position"];
                        sal.value = res["salary"];
                    }
                }
              }
              xhr.open("GET", "search.php?str=" + str, true);
              xhr.send();
          }

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