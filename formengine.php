<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>

    <?php

    include 'connection.php';



    if (isset($_POST['user-add-booking'])) {

        $user = $_POST['user'];
        echo $user;
        $mosque = $_POST["mosqueid"];
        echo $mosque;
        $DBooking = ($_POST['DBooking']);
        echo $DBooking;
        $sdate = ($_POST['sdate']);
        echo $sdate;
        $edate = ($_POST['edate']);
        echo $edate;
        $status = ($_POST['status']);
        echo $status;

        $sql = "INSERT INTO `booking`(USERID, MOSQUEID, ITEM_ID, SDATE, EDATE, STATUS_ID) VALUES('$user', '$mosque', '$DBooking', '$sdate', '$edate', '$status')";
        $result = mysqli_query($conn, $sql) or die('query failed');

        if ($result) {
            echo 'registered successfully!';
            header('location:user-booking-list.php');
        } else {
            echo 'Error Booking';
            header('location:index.php');
        }
    }

    if (isset($_POST['user-add-complaint'])) {


        // $BookingID = mysqli_real_escape_string($conn, $_POST['bookingID']);
        //$ITCOMID = mysqli_real_escape_string($conn, ($_POST['ITCOMID']));

        $user = $_POST['userid'];
        //echo $user;
        $mosque = $_POST["mosqueid"];
        //echo $mosque;
        $statusid = ($_POST['statusid']);
        //echo $statusid;
        $details = ($_POST['details']);
        //echo $details;
        $ADate = ($_POST['ADate']);
        //echo $ADate;
        $itemid = ($_POST['itemid']);
        echo $itemid;

        $sql = "INSERT INTO `complaint`(USERID, MOSQUEID, STATUS_ID, DETAILS, DATE, ITEM_ID) VALUES('$user', '$mosque', '$statusid', '$details', '$ADate', '$itemid')";
        $result = mysqli_query($conn, $sql) or die('query failed');

        if ($result) {
            echo 'registered successfully!';
            header('location:user-complaint-list.php');
        } else {
            echo 'Error Complaint';
            header('location:index.php');
        }
    }

    if (isset($_POST['admin-add-staff'])) {

        $mosqueid = $_POST['mosqueid'];
        echo $mosqueid;
        $fullname = $_POST['i_fullname'];
        echo $fullname;
        $email = $_POST["i_email"];
        echo $email;
        $contactnum = ($_POST['i_telnum']);
        echo $contactnum;
        $password = ($_POST['password']);
        echo $password;

        $sql = "INSERT INTO ITCOM (MOSQUEID, I_FULLNAME, I_EMAIL, I_TELNUM, PASSWORD) VALUES('$mosqueid', '$fullname', '$email', '$contactnum', '$password')";
        $result = mysqli_query($conn, $sql) or die('query failed');

        if ($result) {
            echo 'registered successfully!';
            header('location:admin-itcomm-list.php');
        } else {
            echo 'Error Booking';
            header('location:index-admin.php');
        }
    }

    if (isset($_POST['itcomm-add-staff'])) {

        $mosqueid = $_POST['mosqueid'];
        echo $mosqueid;
        $fullname = $_POST['i_fullname'];
        echo $fullname;
        $email = $_POST["i_email"];
        echo $email;
        $contactnum = ($_POST['i_telnum']);
        echo $contactnum;
        $password = ($_POST['password']);
        echo $password;

        $sql = "INSERT INTO ITCOM (MOSQUEID, I_FULLNAME, I_EMAIL, I_TELNUM, PASSWORD) VALUES('$mosqueid', '$fullname', '$email', '$contactnum', '$password')";
        $result = mysqli_query($conn, $sql) or die('query failed');

        if ($result) {
            echo 'registered successfully!';
            header('location:itcomm-itcomm-list.php');
        } else {
            echo 'Error Booking';
            header('location:index-itcomm.php');
        }
    }

    if (isset($_POST['admin-add-mosque'])) {


        // $BookingID = mysqli_real_escape_string($conn, $_POST['bookingID']);
        //$ITCOMID = mysqli_real_escape_string($conn, ($_POST['ITCOMID']));

        $mosqueName = $_POST['mosqueName'];
        //echo $mosqueName;
        $address = $_POST['address'];
        //echo $address;


        $sql = "INSERT INTO mosque(MOSQUENAME, ADDRESS) VALUES('$mosqueName', '$address')";
        $result = mysqli_query($conn, $sql) or die('query failed');

        if ($result) {
            echo 'registered successfully!';
            header('location:admin-mosque-list.php');
        } else {
            echo 'Error Booking';
            header('location:index-admin.php');
        }
    }
    ?>
</body>

</html>