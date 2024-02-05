<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login Form</title>
	<?php include("connection.php"); ?>
</head>

<body>
	<?php
	include 'connection.php';
	$email = $_POST['email'];
	$psswd = $_POST['password'];
	$option = $_POST['option'];

	if($option == "U"){
		$select_users = mysqli_query($conn, "SELECT * FROM USER WHERE U_EMAIL = '$email' AND PASSWORD = '$psswd'");

		if (mysqli_num_rows($select_users) > 0) {
			$data = mysqli_fetch_assoc($select_users);

			$_SESSION["uname"] = $data["U_FULLNAME"]; //send data( U_FULLNAME ) back on variable 'name'
			$_SESSION["userid"] = $data["USERID"]; //send data( USERID ) back on variable 'userid'

			echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\"/>";
		} else {
			?>
			<script>
				alert("Invalid email or password.");
			</script>
			<?php
			echo "<meta http-equiv=\"refresh\" content=\"2;URL=login.php\"/>";
		}
	}
	else if($option == "I"){
		$select_users = mysqli_query($conn, "SELECT * FROM ITCOM WHERE I_EMAIL = '$email' AND PASSWORD = '$psswd'");

		if (mysqli_num_rows($select_users) > 0) {
			$data = mysqli_fetch_assoc($select_users);
			$_SESSION["itname"] = $data["I_FULLNAME"]; //send data( I_FULLNAME ) back on variable 'name'
			$_SESSION["itcomid"] = $data["ITCOMID"]; //send data( ITCOMID ) back on variable 'itcomid'
			echo "<meta http-equiv=\"refresh\" content=\"2;URL=index-itcomm.php\"/>";
			
		} else {
			?>
			<script>
				alert("Invalid email or password.");
			</script>
			<?php
			echo "<meta http-equiv=\"refresh\" content=\"2;URL=login-itcomm.php\"/>";
		}
	}
	else if($option == "A"){
		$select_users = mysqli_query($conn, "SELECT * FROM ADMIN WHERE A_EMAIL = '$email' AND PASSWORD = '$psswd'");

		if (mysqli_num_rows($select_users) > 0) {
			$data = mysqli_fetch_assoc($select_users);
			$_SESSION["adname"] = $data["A_FULLNAME"]; //send data( I_FULLNAME ) back on variable 'name'
			$_SESSION["adminid"] = $data["ADMINID"]; //send data( ITCOMID ) back on variable 'itcomid'
			echo "<meta http-equiv=\"refresh\" content=\"2;URL=index-admin.php\"/>";
			
		} else {
			?>
			<script>
				alert("Invalid email or password.");
			</script>
			<?php
			echo "<meta http-equiv=\"refresh\" content=\"2;URL=login-admin.php\"/>";
		}
	}
	?>
</body>

</html>