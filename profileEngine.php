<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>My Profile</title>
</head>

<body>
<?php
    // Include connection file
    require_once "connection.php";
    
	// Get input from form
    $id = trim($_POST["id"]);
    $fullname = trim($_POST["fullname"]);
	$email = trim($_POST["email"]);
    $contactnum = trim($_POST["contactnum"]);
    $password = trim($_POST["password"]);
    $option = trim($_POST["option"]);

    if($option == "U"){
        // Prepare an update statement
        $sql = "UPDATE USER SET U_FULLNAME=?, U_EMAIL=?, U_TELNUM=?, PASSWORD=? WHERE USERID=?";
	    if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $fullname, $email, $contactnum, $password, $id);
        
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redect to landing page
                session_start();
                $_SESSION['uname'] = $fullname;
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=user-profile-view.php\"/>";
            }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
    else if($option == "I"){
        // Prepare an update statement
        $sql = "UPDATE ITCOM SET I_FULLNAME=?, I_EMAIL=?, I_TELNUM=?, PASSWORD=? WHERE ITCOMID=?";
	    if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $fullname, $email, $contactnum, $password, $id);
        
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redect to landing page
                session_start();
                $_SESSION['itname'] = $fullname;
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=itcomm-profile-view.php\"/>";
            }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
    else if($option == "A"){
        // Prepare an update statement
        $sql = "UPDATE ADMIN SET A_FULLNAME=?, A_EMAIL=?, A_TELNUM=?, PASSWORD=? WHERE ADMINID=?";
	    if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $fullname, $email, $contactnum, $password, $id);
        
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redect to landing page
                session_start();
                $_SESSION['adname'] = $fullname;
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=admin-profile-view.php\"/>";
            }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($conn);
?>
</body>

</html>