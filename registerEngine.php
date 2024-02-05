<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Register Form</title>
</head>

<body>

   <?php

   include 'connection.php';

   if (isset($_POST['submit'])) {

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $Pnumber = mysqli_real_escape_string($conn, ($_POST['Pnumber']));
      $Cpass = mysqli_real_escape_string($conn, ($_POST['C_password']));
      $mosqueid = mysqli_real_escape_string($conn, ($_POST['mosqueid']));
      $option = mysqli_real_escape_string($conn, ($_POST['option']));

      if($option == "U"){
         $select_users = mysqli_query($conn, "SELECT * FROM user WHERE u_email = '$email' AND password = '$Cpass'") or die('query failed');

         if (mysqli_num_rows($select_users) > 0) {
            echo 'user already exist!';
            header('location:register.php');
         } else {
            mysqli_query($conn, "INSERT INTO `user`(u_fullname, u_email, u_telnum, password) VALUES('$name', '$email', '$Pnumber', '$Cpass')") or die('query failed');
            $message[] = 'registered successfully!';
            header('location:login.php');
         }
      }
      else if($option == "I"){
         $select_users = mysqli_query($conn, "SELECT * FROM itcom WHERE i_email = '$email' AND password = '$Cpass'") or die('query failed');

         if (mysqli_num_rows($select_users) > 0) {
            echo 'staff already exist!';
            header('location:register-itcomm.php');
         } else {
            mysqli_query($conn, "INSERT INTO `itcom`(mosqueid, i_fullname, i_email, i_telnum, password) VALUES('$mosqueid', '$name', '$email', '$Pnumber', '$Cpass')") or die('query failed');
            $message[] = 'registered successfully!';
            header('location:login-itcomm.php');
         }
      }
   }



   ?>
</body>

</html>