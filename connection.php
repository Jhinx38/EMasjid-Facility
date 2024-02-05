<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "emasjid";
$conn = mysqli_connect($serverName, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
