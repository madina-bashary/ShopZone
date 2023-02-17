
        <?php 
        include 'connect.php';
        if(isset($_POST["date-man"]))
          $fromDate = $_POST["date-man"];
          $toDate = $_POST["to-date-man"];
          $output = '';
          $query = mysqli_query($con,"SELECT `id`, `firstname`, `lastname`, `username`, `email`, `password`, 
          `age`, `phone`,  `date` FROM `acount` WHERE `date` BETWEEN '$fromDate' AND '$toDate'");
          
              $row = mysqli_fetch_assoc($query);
              $obj=array(
                "id"=>$row["id"],
                "firstname"=>$row["firstname"],
                "lastname"=>$row["lastname"],
                "username"=>$row["username"],
                "email"=>$row["email"],
                "password"=>$row["password"],
                "age"=>$row["age"],
                "phone"=>$row["phone"],
                "date"=>$row["date"],

              );
              echo json_encode($obj);
          

        ?>