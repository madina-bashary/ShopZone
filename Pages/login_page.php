<?php 
              include 'connect.php';

              if(isset($_POST['login'])){
                $user=$_POST['username'];
                $password=$_POST['password'];

                $select = "SELECT * FROM `acount` WHERE `username`='$user' AND `password`='$password'";
                $result=mysqli_query($con,$select);
                if(mysqli_num_rows($result)==1){
                  
                  $_SESSION['username']=$user;
                  $_SESSION['password']=$password;
                  header('location:Home.php');
                  
                }
                else{
                   
                  header('location:Login.php');
                }
              }
              
              ?>