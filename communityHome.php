<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'connection.php';

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
            <a href="index.php" class="logo d-flex align-items-center"> <span class="d-none d-lg-block">Facility Management</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <!-- search by name -->
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="">
                <input type="text" name="searchData" placeholder="Enter status.." title="Enter status..">
                <button type="submit" name="btnSearch" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

                        <a href="login.php">
                            <button href="" type="button" class="btn btn-primary mb-2">
                                login... <span class="badge bg-white text-warning"></span>
                            </button>
                        </a>

                    </a><!-- End Profile Iamge Icon -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="community-mosque-list.php">
                    <i class="bi bi-triangle-fill"></i>
                    <span>Mosque List</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="communityHome.php">
                    <i class="bi bi-grid-fill"></i>
                    <span>Facility List</span>
                </a>
            </li><!-- End Dashboard Nav -->

    </aside><!-- End Sidebar-->


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>E-Masjid Booking & Complaint</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title // breadcrumbs -->

        <div class="card-body">
            <h5 class="card-title">Facility Booking List</h5>

            <div class="card-body">

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Action</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Speaker</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Dewan</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Microphone</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Projector</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Fan</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Carpet</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Cushions</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Prayer Mats</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>Islamic Books</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>Wudu Area Supplies</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">11</th>
                            <td>Quran</td>
                            <td>
                                <a href="login.php">
                                    <button href="" type="button" class="btn btn-warning mb-2">
                                        Book... <span class="badge bg-white text-warning"></span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- End Table with hoverable rows -->

            </div>

        </div>
        <!-- end of booking form -->
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