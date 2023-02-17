

<?php
	include 'connect.php';

	if(isset($_POST['submit']) ){
 
		//if($_FILES['uploadfile']['name'] != "" && $_POST['name'] != ""){
			$name = $_POST['acount_name'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $age = $_POST['age'];
            $phone=$_POST['number'];
            $date=$_POST['date-man'];
			
			$select="SELECT * FROM acount WHERE username='$username' OR email='$email' OR phone='$phone'  ";
			$result=mysqli_query($con,$select);
			if(mysqli_num_rows($result)>0){
			  
			
			  echo "دیتا تکراری اجازه نیست";
			  
			}
			else{

			$sql="INSERT INTO acount(firstname, lastname, username,
			email, password, age, phone, date)	VALUE ('$name','$lastname','$username','$email',
			'$password', '$age', '$phone' , '$date')";
			echo $sql;
			$result=mysqli_query($con,$sql);
   
			if($result){
			echo "دیتا ذخیره شد";
			} else{
				
				die(mysqli_error($con));
			
			}
			}
		}
		
	?>