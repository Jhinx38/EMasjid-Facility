<?php
// Include connection file
require_once "connection.php";

// Define variables and initialize with empty values
$userid = $staffid = $itcomid = $mosqueid = $status = $details = $startdate = $enddate = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get input from form
    $complaintid = trim($_POST["complaintid"]);
    $userid = trim($_POST["userid"]);
    $mosqueid = trim($_POST["mosqueid"]);
    $statusid = trim($_POST["statusid"]);
    $itemid = trim($_POST["itemid"]);
    $details = trim($_POST["details"]);
    $date = trim($_POST["date"]);

    // Prepare an update statement
    $sql = "UPDATE COMPLAINT SET USERID=?, MOSQUEID=?, STATUS_ID=?, ITEM_ID=?, DETAILS=?, DATE=? WHERE COMPLAINTID=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssss", $userid, $mosqueid, $statusid, $itemid, $details, $date, $complaintid);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records created successfully. Redect to landing page
            header("location: user-complaint-list.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($conn);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["complaintid"]) && !empty(trim($_GET["complaintid"]))) {
        // Get URL parameter
        $complaintid =  trim($_GET["complaintid"]);

        // Prepare a select statement
        $sql = "SELECT C.USERID, U_FULLNAME, C.MOSQUEID, MOSQUENAME, DETAILS, ITEM_NAME, C.ITEM_ID, DATE, STATUS_NAME, C.STATUS_ID FROM COMPLAINT C, ITEM I, USER U, MOSQUE M, STATUS S" .
            " WHERE ((C.USERID = U.USERID AND C.ITEM_ID = I.ITEM_ID) AND (C.MOSQUEID = M.MOSQUEID AND C.STATUS_ID = S.STATUS_ID)) AND COMPLAINTID = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $complaintid);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $userid = $row["USERID"];
                    $u_fullname = $row["U_FULLNAME"];
                    $mosqueid = $row["MOSQUEID"];
                    $mosquename = $row["MOSQUENAME"];
                    $statusid = $row["STATUS_ID"];
                    $statusname = $row["STATUS_NAME"];
                    $itemid = $row["ITEM_ID"];
                    $itemname = $row["ITEM_NAME"];
                    $details = $row["DETAILS"];
                    $date = $row["DATE"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $name = $_SESSION['uname'];
    if ($name == "") {
        header("Location: login.php");
        exit();
    }
    ?>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Complaint Update</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center"> <span class="d-none d-lg-block">Facility Management</span></a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?php echo $name; ?></span>

                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="user-profile-view.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="user-delete-account.php">
                                <i class="bi bi-archive"></i>
                                <span>Delete Account</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="logoutengine.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-file-earmark-text-fill"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="user-add-booking.php">
                            <i class="bi bi-circle"></i><span>Booking</span>
                        </a>
                    </li>
                    <li>
                        <a href="user-add-booking.php">
                            <i class="bi bi-circle"></i><span>Complaint</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="user-booking-list.php">
                    <i class="bi bi-collection-fill"></i>
                    <span>Booking List</span>
                </a>
            </li><!-- End Booking List Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="user-complaint-list.php">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Complaint List</span>
                </a>
            </li><!-- End Complaint List Nav -->
    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Update Complaint Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="user-complaint-list.php">Back</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body" action="" method="POST">
                        <h5 class="card-title">Enter New Information</h5>

                        <!-- Custom Styled Validation -->
                        <form class="row g-3 needs-validation" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" novalidate>
                            <p>
                                <input type="hidden" name="userid" value="<?php echo $userid; ?>" readonly>
                            </p>

                            <input type="hidden" class="form-control" name="complaintid" value="<?php echo $complaintid; ?>" readonly>

                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">User's Full Name</label>
                                <input type="text" class="form-control" name="u_fullname" value="<?php echo $u_fullname; ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Mosque Name</label>
                                <select class="form-control" name="mosqueid" required>
                                    <option value="<?php echo $mosqueid; ?>"><?php echo $mosquename; ?></option>
                                    <?php
                                    $sql = "SELECT * FROM MOSQUE";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            if ($mosqueid != $row["MOSQUEID"]) {
                                                echo '<option value="' . $row['MOSQUEID'] . '">' . $row['MOSQUENAME'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Facility</label>
                                <select class="form-control" name="itemid" required>
                                    <option value="<?php echo $itemid; ?>"><?php echo $itemname; ?></option>
                                    <?php
                                    $sql = "SELECT * FROM ITEM";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            if ($itemid != $row["ITEM_ID"]) {
                                                echo '<option value="' . $row['ITEM_ID'] . '">' . $row['ITEM_NAME'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Details</label>
                                <input type="text" class="form-control" name="details" value="<?php echo $details; ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" value="<?php echo $date; ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Complaint Status</label>
                                <input type="text" class="form-control" name="statusname" value="<?php echo $statusname; ?>" readonly>
                            </div>
                            <div class="col-12">
                                <input type="hidden" class="form-control" name="userid" value="<?php echo $userid; ?>">
                                <input type="hidden" class="form-control" name="statusid" value="<?php echo $statusid; ?>">
                                <button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure you want to update?')">Update</button>
                            </div>
                        </form><!-- End Custom Styled Validation -->

                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="credits">
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>