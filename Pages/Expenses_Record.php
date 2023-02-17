
<?php

include 'connect.php';

$select = "SELECT * FROM `masaref_type` ";
  $masraf_result=mysqli_query($con,$select);
 
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $details = $_POST['details'];
  $price = $_POST['price'];
  $amount = $_POST['amount'];
  $date = $_POST['date-man'];
  

$sql="INSERT INTO `masaref`(`id_type`, `discription`, `amount`, `price`, `date`)
VALUES('$name','$details','$amount', '$price', '$date')";
$result= mysqli_query($con, $sql);
if($result){
  "setnull()";
}
else{
  die(mysqli_error($con));
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SHOP MIS/Expenses Record</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- logo -->
    <link rel="shortcut icon" href="../Pictures/LOGO.png" type="image/x-icon">
    <!-- CSS link -->
    <link rel="stylesheet" href="../CSS/Record.css">
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="../bootstrap_4/css/bootstrap.min.css">
    <!-- Bootstrap JS link-->
    <script src="../bootstrap_4/js/bootstrap.min.js"></script>
    <!-- Jqurey link -->
    <script src="../bootstrap_4/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JS link-->
    <script src="../bootstrap_4/js/bootstrap.min.js"></script>
    <!-- pop up -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>

<body style="background-color: #f7f0e8; padding: 60px 40px;">
    <!-- Main content -->
   <section class="content container-fluid">
    <div class="row" style="text-align: center;">
      <div class="col-md-12">
        <div class="titlebody">
          <div class="title">
            <span id="title">EXPENSES RECORD</span>
          </div>
        </div>
      </div>
    </div>

    <!-- first row for form content -->
   <div class="row">
     <div class="col-md-12">
       <form action="#" method="POST" style="padding: 12px; margin-bottom: -20px !important;" class="needs-validation" >
        <div class="row">
           <!-- first col -->
           <div class="col-md-4">
            <div class="form-group">
              <label for="name">Name</label>
              <select name="name" id="name" class="form-control" required>
              <?php while($row=mysqli_fetch_array($masraf_result)):; ?>
                <option value="<?php echo $row[0]; ?>" > <?php echo $row[1];?></option>
                <?php endwhile; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="details">Details</label>
              <input type="text" class="form-control" id="details"  name="details" placeholder="Details" pattern = "^[a-zA-Z_ ]+$" required>
            </div>
          </div>

          <!-- second col -->
          <div class="col-md-4">
            <div class="form-group" style="position: relative;">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price"  name="price" placeholder="Price" required>
              </div>

            <div class="form-group">
              <label for="amount">Amount</label>
              <input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" pattern="^[0-9]+$" required>
            </div>
          </div>

          <!-- third col -->
          <div class="col-md-4">
            <div class="form-group">
              <label for="date-man">Date</label>
              <input type="date" class="form-control" id="date-man" name="date-man" required>
            </div>

            <div class="form-group">
              <div class="col-md-12" style="width: 100% !important; padding-left: 0px; padding-right: 0px;">
                <button name="submit"  type="submit" class="btn saveBtn" type="button" id="submit-button" style="background-color: #1F4594; margin-top: 27px; width: 100%;" onClick="setTimeout(needs-validation, 1000)">SAVE</button> 
                </div>
            </div>
          </div>
        </div>
       </form>

        <form action="Expencetype.php" method="POST">
          <button type="button" data-toggle="modal" data-target="#add" class="btn col-md-12" type="button" id="add-expense" style="background-color: #f1ae21; margin-top: 30px; color: white; font-weight: bold; padding: 8 20px; width: 100%; border-radius: 10px;">Add New Expense</button> 
        <div class="modal" id="add">
          <div class="modal-dialog modal-dialog-centered modal-md">
              <div class="modal-content">
                  <div class="modal-header" style="background-color: #f1ae21; height: 180px;">
                    <img src="../Pictures/Capture-PhotoRoom (1).png" alt="" width="110px" height="100px" style="margin-left: 180px; margin-top: 20px;">
                  </div>
                  <div class="modal-body" style="text-align: center; margin: 20px 40px;">
                      <div class="row">
                          <label for="expense">Add New Expenses</label>
                          <input type="text" class="form-control" id="expense" placeholder="Add New Expenses" name="expense" pattern = "^[a-zA-Z_]+$" required>
                          <input type="submit"  name="Add" class="col-sm-12 col-md-5" type="button" id="button_add" >
                          <button class="col-sm-12 col-md-5" type="button" id="button_not_add" data-dismiss="modal">Don't Add</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        </form>

      
     </div>
   </div>
 </section>
       <script>
        function setnull(){
        document.getElementById["details"].value=null;
        document.getElementById["price"].value=null;
        document.getElementById["amount"].value=null;
      
       }
       </script>

<!-- query code for datepicker-->
<script>
  $(document).ready(() => {
          $('#date-man').datepicker({
              changeMonth: true,
              changeYear: true
          });
      });

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