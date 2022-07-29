<?php
session_start();
include 'connection.php';
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
    <?php $page = 'admin';
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
          <span class="dashboardTitle">Admin</span>

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
                } ?>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="col-lg-12 mb-2">
            <div class="d-flex flex-row-reverse">
              <div class="mx-1">
                <!-- <a href="addModal.php" class="btn btn-success float-right li-modal">
                                    Add Ticket
                                </a> -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTicket">
                  Add Admin</button>
              </div>
            </div>
          </div>
          <?php
          if (isset($_POST["addBtn"])) {
            $adName = $_POST["adminName"];
            $adEmail = $_POST["adminEmail"];
            $adPassword = $_POST["adminPassword"];

            $sql = "INSERT INTO admin (adminName,adminEmail,adminPassword) VALUES ('$adName','$adEmail','$adPassword')";
            $result = mysqli_query($db, $sql);

            if ($result) {
              echo '<div class="alert alert-success" role="alert">
Admin is added</div>';
            } else {
              echo '<div class="alert alert-danger" role="alert">
Admin is not added</div>';
            }
          }

          if (isset($_POST['deleteBtn'])) {
            $id = $_POST["deleteID"];

            $deleteSql = "DELETE FROM `admin` WHERE `adminId`=$id";
            $result = mysqli_query($db, $deleteSql);

            if ($result) {
              echo '<div class="alert alert-success" role="alert">
                     The selected admin is deleted.</div>';
            } else {
              echo '<div class="alert alert-danger" role="alert">
                      Admin is not deleted</div>';
            }
          }
          ?>
          <div class="table-responsive">
            <table class="table table-ticket table-bordered table-hover" id="dataTableID">
              <thead>
                <tr>
                  <th scope="col" width="7%">Admin ID</th>
                  <th scope="col" class="d-none">ID</th>
                  <th scope="col">Admin Name</th>
                  <th scope="col">Admin Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $viewSql = "SELECT * FROM `admin`";
                $result = mysqli_query($db, $viewSql);

                while ($row = mysqli_fetch_assoc($result)) {
                  $pre = $row['adminPrefix'];
                  $id = $row['adminId'];
                  $adName = $row['adminName'];
                  $adEmail = $row['adminEmail'];
                ?>
                  <tr>
                    <td><?php echo $pre . "" . $id; ?></td>
                    <td class="d-none"><?php echo $id; ?></td>
                    <td><?php echo $adName; ?></td>
                    <td><?php echo $adEmail; ?></td>
                    <td class="action-button">
                      <button type="button" class="btn delete" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id; ?>">
                        <img src="./assets/img/lineIcon/trash.svg"></button>
                    </td>
                  </tr>
                  <!-- Delete Ticket -->
                  <div class="modal fade text-dark" id="delete<?php echo $id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteDataLabel">Confirmation Message</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="POST">
                            <div class="mb-3">
                              <input type="hidden" name="deleteID" value="<?php echo $id; ?>">
                            </div>
                            <div class="mb-3">
                              Are you sure that you want to delete the selected admin - <?php echo $pre . "" . $id; ?>?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success" name="deleteBtn">Yes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="modal addModal fade text-dark" id="addTicket" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <body>
              <div class="modal-header">
                <h5 class="modal-title">Add New Admin</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="form-row">
                    <label for="adminName" class="form-input-title"><b>Admin Name</b></label>
                    <input type="text" class="form-control" name="adminName" required>
                    <div class="invalid-feedback">
                      Please provide a valid restaurant name.
                    </div>
                  </div>
                  <div class="form-row">
                    <label for="adminEmail" class="form-input-title"><b>Admin Email</b></label>
                    <input type="email" class="form-control" name="adminEmail" required>
                    <div class="invalid-feedback">
                      Please provide a valid date.
                    </div>
                  </div>
                  <div class="form-row">
                    <label for="adminPassword" class="form-input-title"><b>Admin Password</b></label>
                    <input type="password" class="form-control" name="adminPassword" required>

                    <div class="invalid-feedback">
                      Please provide a valid range.
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" name="addBtn">Add Admin</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>

      <!-- End of Main Content -->

      <?php include('./assets/includes/body.php'); ?>

      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="./assets/js/sb-admin-2.js"></script>

      <!-- Page level plugins -->
      <script src="vendor/chart.js/Chart.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="js/demo/chart-area-demo.js"></script>
      <script src="js/demo/chart-pie-demo.js"></script>

      <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
      </script>

</body>

</html>