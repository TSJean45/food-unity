<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Custom styles for this template-->
  <link href="./assets/css/sb-admin-2.css" rel="stylesheet">
  <?php include('./assets/includes/head.php'); ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $page = 'dashboard';
    include('./assets/includes/adminSideBar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn mr-3">
            <i class="lni lni-menu tooglerButton"></i>
          </button>
          <span class="dashboardTitle">Main Dashboard</span>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php
                $currentUser = $_SESSION['adminId'];
                $sql = "SELECT * FROM admin WHERE adminId ='$currentUser'";
                $result = mysqli_query($db, $sql);

                if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $adminName = $row['adminName'];

                    echo '<script>console.log("' . $adminName . ' is running") </script>'

                ?>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 nameTitle big"><?php echo $adminName ?></span>
                <?php }
                } else {
                  echo '<div class="alert alert-danger" role="alert">
                      Ticket is not approved</div>';
                  echo mysqli_error($db);
                } ?>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Campaigns Hosted</div>
                      <?php
                      $count = "SELECT * FROM `restaurantTicket`";
                      if ($result = mysqli_query($db, $count)) {
                        $totalCampaign = mysqli_num_rows($result);
                      ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalCampaign ?></div>

                        <span class="mb-0 text-gray-800">
                          <a href="adminTicket.php" class=" text-primary">Click To Head Over</a>
                        </span>
                    </div>
                  <?php } ?>
                  <div class="col-auto">
                    <img src="./assets/img/lineIcon/agenda.svg">
                  </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Campaign Ended</div>
                      <?php
                      $count = "SELECT * FROM `restaurantTicket` WHERE `ticketStatus` = 'Ended'";
                      if ($result = mysqli_query($db, $count)) {
                        $endCampaign = mysqli_num_rows($result);
                      ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $endCampaign ?></div>
                        <span class="mb-0 text-gray-800">
                          <a href="adminTicket.php" class=" text-success">Click To Head Over</a>
                        </span>
                    </div>
                  <?php } ?>
                  <div class="col-auto">
                    <img src="./assets/img/lineIcon/book.svg">
                  </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Pending Contact Requests</div>
                      <?php
                      $count = "SELECT * FROM `contact` WHERE `contactStatus` = 'Unreplied'";
                      if ($result = mysqli_query($db, $count)) {
                        $contact = mysqli_num_rows($result);
                      ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $contact ?></div>
                        <span class="mb-0 text-gray-800">
                          <a href="contact.php" class="text-info">Click To Head Over</a>
                        </span>
                    </div>
                  <?php } ?>
                  <div class="col-auto">
                    <img src="./assets/img/lineIcon/phone2.svg">
                  </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pending Tickets</div>
                      <?php
                      $count = "SELECT * FROM `restaurantTicket` WHERE `ticketStatus` = 'Pending'";
                      if ($result = mysqli_query($db, $count)) {
                        $ticket = mysqli_num_rows($result);
                      ?>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ticket ?></div>
                        <span class="mb-0 text-gray-800">
                          <a href="adminTicket.php" class=" text-warning">Click To Head Over</a>
                        </span>
                    </div>
                  <?php } ?>
                  <div class="col-auto">
                    <img src="./assets/img/lineIcon/reload.svg">
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">Tickets
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <table class="table table-ticket table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col" width="7%">Ticket ID</th>
                        <th scope="col" width=" 50%">Restaurant Full Address</th>
                        <th scope="col">Restaurant Closing Time</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $viewSql = "SELECT * FROM `restaurantTicket` limit 4";
                      $result = mysqli_query($db, $viewSql);

                      while ($row = mysqli_fetch_assoc($result)) {
                        $pre = $row['ticketPrefix'];
                        $id = $row['ticketId'];
                        $resAdd = $row['restaurantAddress'];
                        $resTime = $row['restaurantEndTime'];
                        $status = $row['ticketStatus'];
                        $date = $row['ticketDate'];

                      ?>
                        <tr>
                          <td><?php echo $pre . "" . $id; ?></td>
                          <td><?php echo $resAdd; ?></td>
                          <td><?php echo $date . "," . $resTime; ?></td>
                          <td><?php echo $status; ?></td>
                        </tr>
                      <?php  }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4" style="height: 495px;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  List Of Admins
                </div>
                <!-- Card Body -->

                <div class="card-body">
                  <table class="table table-ticket table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col" width="7%">Admin ID</th>
                        <th scope="col">Admin Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $viewSql = "SELECT * FROM `admin` limit 6";
                      $result = mysqli_query($db, $viewSql);

                      while ($row = mysqli_fetch_assoc($result)) {
                        $pre = $row['adminPrefix'];
                        $id = $row['adminId'];
                        $name = $row['adminName'];

                      ?>
                        <tr>
                          <td><?php echo $pre . "" . $id; ?></td>
                          <td><?php echo $name; ?></td>
                        </tr>
                      <?php  }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include('./assets/includes/body.php'); ?>
        <!-- Custom scripts for all pages-->
        <script src="./assets/js/sb-admin-2.js"></script>

</body>

</html>