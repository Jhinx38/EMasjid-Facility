<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  session_start();
  include 'connection.php';
  $name = $_SESSION['uname'];
  if ($name == "") {
    header("Location: login.php");
    exit();
  }
  ?>
  <script>
    function myalert() {
      alert("Your booking has been approved. Cannot be updated.");
    }
  </script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Complaint List</title>
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

    <!-- search by name -->
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="">
        <input type="text" name="searchData" placeholder="Enter status.." title="Enter status..">
        <button type="submit" name="btnSearch" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
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
            <a href="user-add-complaint.php">
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
      <h1>Facility Complaint List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- Start Table -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Information</h5>
              <!-- Default Table -->
              <?php
              // include connection file
              require_once "connection.php";

              //Attempt select query execution
              if (!isset($_POST['btnSearch'])) {
                $sql = "SELECT COMPLAINTID, DATE, STATUS_NAME, ITEM_NAME, DETAILS, MOSQUENAME FROM COMPLAINT C, STATUS S, USER U, ITEM I, MOSQUE M WHERE ((C.STATUS_ID = S.STATUS_ID AND C.ITEM_ID = I.ITEM_ID) AND C.USERID = U.USERID AND C.MOSQUEID = M.MOSQUEID) AND U_FULLNAME LIKE '$name'";
                if ($result = mysqli_query($conn, $sql)) {
                  if (mysqli_num_rows($result) > 0) {
                    echo "<table class='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>No</th>";
                    echo "<th scope='col'>Mosque Name</th>";
                    echo "<th scope='col'>Complaint Date</th>";
                    echo "<th scope='col'>Facility</th>";
                    echo "<th scope='col'>Details</th>";
                    echo "<th scope='col'>Status</th>";
                    echo "<th scope='col'>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo '<th scope="row">' . $count . "</th>";
                      echo "<td>" . $row['MOSQUENAME'] . "</td>";
                      echo "<td>" . $row['DATE'] . "</td>";
                      echo "<td>" . $row['ITEM_NAME'] . "</td>";
                      echo "<td>" . $row['DETAILS'] . "</td>";
                      echo "<td>" . $row['STATUS_NAME'] . "</td>";
                      echo "<td>";
                      if ($row['STATUS_NAME'] != "Done") {
                        echo '<a href="user-update-complaint.php?complaintid=' . $row['COMPLAINTID'] . '">
                              <i class="bi bi-pen-fill"></i>
                              <span>Update</span>
                              </a>';
                      } else {
                        echo '<a href="" onclick="myalert();">Update</a>';
                      }
                      echo " ";
                      echo '<a href="user-delete-complaint.php?complaintid=' . $row['COMPLAINTID'] . '">
                            <i class="bi bi-eraser-fill"></i>
                              <span>Delete</span>
                            </a>';
                      echo "</td>";
                      echo "</tr>";
                      $count++;
                    }
                    echo "</tbody>";
                    echo "</table>";
                  } else {
                    echo "<table class='table'>";
                    echo "<tbody>";
                    echo "<td>No records were found.</td>";
                    echo "</tbody>";
                    echo "</table>";
                  }
                }
              } elseif (isset($_POST['btnSearch'])) {
                if (empty(trim($_POST['searchData']))) {
                  $sql = "SELECT COMPLAINTID, DATE, STATUS_NAME, ITEM_NAME, DETAILS FROM COMPLAINT C, STATUS S, USER U, ITEM I WHERE ((C.STATUS_ID = S.STATUS_ID AND C.ITEM_ID = I.ITEM_ID) AND C.USERID = U.USERID AND C.MOSQUEID = M.MOSQUEID) AND U_FULLNAME LIKE '$name'";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    echo "<table class='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>No</th>";
                    echo "<th scope='col'>Mosque Name</th>";
                    echo "<th scope='col'>Complaint Date</th>";
                    echo "<th scope='col'>Facility</th>";
                    echo "<th scope='col'>Details</th>";
                    echo "<th scope='col'>Status</th>";
                    echo "<th scope='col'>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo '<th scope="row">' . $count . "</th>";
                      echo "<td>" . $row['MOSQUENAME'] . "</td>";
                      echo "<td>" . $row['DATE'] . "</td>";
                      echo "<td>" . $row['ITEM_NAME'] . "</td>";
                      echo "<td>" . $row['DETAILS'] . "</td>";
                      echo "<td>" . $row['STATUS_NAME'] . "</td>";
                      echo "<td>";
                      if ($row['STATUS_NAME'] != "Done") {
                        echo '<a href="user-update-complaint.php?complaintid=' . $row['COMPLAINTID'] . '">
                              <i class="bi bi-pen-fill"></i>
                              <span>Update</span>
                              </a>';
                      } else {
                        echo '<a href="" onclick="myalert();">Update</a>';
                      }
                      echo " ";
                      echo '<a href="user-delete-complaint.php?complaintid=' . $row['COMPLAINTID'] . '">
                            <i class="bi bi-eraser-fill"></i>
                              <span>Delete</span>
                            </a>';
                      echo "</td>";
                      echo "</tr>";
                      $count++;
                    }
                    echo "</tbody>";
                    echo "</table>";

                    // Free result set
                    mysqli_free_result($result);
                  } else {
                    echo "<table class='table'>";
                    echo "<tbody>";
                    echo "<td>No records were found.</td>";
                    echo "</tbody>";
                    echo "</table>";
                  }
                } else {
                  $data = $_POST['searchData'];
                  $sql = "SELECT COMPLAINTID, DATE, STATUS_NAME, ITEM_NAME, DETAILS, MOSQUENAME FROM COMPLAINT C, STATUS S, USER U, ITEM I, MOSQUE M WHERE (((C.STATUS_ID = S.STATUS_ID AND C.ITEM_ID = I.ITEM_ID) AND C.USERID = U.USERID AND C.MOSQUEID = M.MOSQUEID) AND U_FULLNAME LIKE '$name') AND STATUS_NAME LIKE '$data'";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    echo "<table class='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>No</th>";
                    echo "<th scope='col'>Mosque Name</th>";
                    echo "<th scope='col'>Complaint Date</th>";
                    echo "<th scope='col'>Facility</th>";
                    echo "<th scope='col'>Details</th>";
                    echo "<th scope='col'>Status</th>";
                    echo "<th scope='col'>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $count = 1;
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo '<th scope="row">' . $count . "</th>";
                      echo "<td>" . $row['MOSQUENAME'] . "</td>";
                      echo "<td>" . $row['DATE'] . "</td>";
                      echo "<td>" . $row['ITEM_NAME'] . "</td>";
                      echo "<td>" . $row['DETAILS'] . "</td>";
                      echo "<td>" . $row['STATUS_NAME'] . "</td>";
                      echo "<td>";
                      if ($row['STATUS_NAME'] != "Done") {
                        echo '<a href="user-update-complaint.php?complaintid=' . $row['COMPLAINTID'] . '">
                              <i class="bi bi-pen-fill"></i>
                              <span>Update</span>
                              </a>';
                      } else {
                        echo '<a href="" onclick="myalert();">Update</a>';
                      }
                      echo " ";
                      echo '<a href="user-delete-complaint.php?complaintid=' . $row['COMPLAINTID'] . '">
                            <i class="bi bi-eraser-fill"></i>
                              <span>Delete</span>
                            </a>';
                      echo "</td>";
                      echo "</tr>";
                      $count++;
                    }
                    echo "</tbody>";
                    echo "</table>";

                    // Free result set
                    mysqli_free_result($result);
                  } else {
                    echo "<table class='table'>";
                    echo "<tbody>";
                    echo "<td>No records were found.</td>";
                    echo "</tbody>";
                    echo "</table>";
                  }
                }
              }

              // Close connection
              mysqli_close($conn);
              ?>
            </div>
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