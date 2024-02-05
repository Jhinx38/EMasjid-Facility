<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include 'connection.php';
    $name = $_SESSION['itname'];
    if ($name == "") {
        header("Location: login-itcomm.php");
        exit();
    }
    $sql = "SELECT I.*, MOSQUENAME FROM ITCOM I, MOSQUE M WHERE I.MOSQUEID = M.MOSQUEID AND I_FULLNAME LIKE '$name'";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $mosqueid = $row["MOSQUEID"];
            $mosquename = $row["MOSQUENAME"];
        }
    }
    ?>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Emasjid Facility</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/logo.png" rel="icon">
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
            <a href="index-itcomm.php" class="logo d-flex align-items-center"> <span class="d-none d-lg-block">Facility Management</span>
            </a>
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
                            <a class="dropdown-item d-flex align-items-center" href="itcomm-profile-view.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="itcomm-delete-account.php">
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
                <a class="nav-link collapsed" href="index-itcomm.php">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-file-earmark-text-fill"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="admin-add-itcomm.php">
                            <i class="bi bi-circle"></i><span>Add IT Committee</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Form Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="itcomm-booking-list.php">
                    <i class="bi bi-collection-fill"></i>
                    <span>Booking List</span>
                </a>
            </li><!-- End Booking List Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="itcomm-complaint-list.php">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Complaint List</span>
                </a>
            </li><!-- End Complaint List Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="itcomm-itcomm-list.php">
                    <i class="bi bi-person-fill"></i>
                    <span>IT Committee List</span>
                </a>
            </li><!-- End IT Committee List Nav -->
    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>E-Masjid Staff Form</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index-admin.php">Home</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title // breadcrumbs -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Staff Form</h5>

                <form class="row g-3" method="post" action="formengine.php" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="i_fullname" value="" required>
                            <label for="floatingName" autocapitalize="on">Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="mosquename" value="<?php echo $mosquename; ?>" readonly>
                            <label for="floatingSelect">Mosque</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="i_email" value="" required>
                            <label for="floatingName" autocapitalize="on">Email</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="i_telnum" value="" required>
                            <label for="floatingName" autocapitalize="on">Contact Number</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="password" value="" required>
                            <label for="floatingName" autocapitalize="on">Password</label>
                        </div>
                    </div>
                    <div class="text-center">

                        <input type="hidden" name="status" value="2">
                        <input type="hidden" name="mosqueid" value="<?php echo $mosqueid; ?>">
                        <button type="submit" name="itcomm-add-staff" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End floating Labels Form -->

            </div>
        </div>

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