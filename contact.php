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
    <?php $page = 'contact';
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
          <span class="dashboardTitle">Contact</span>

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
          <div class="col-lg-12 mb-2">
            <?php

            if (isset($_POST['deleteBtn'])) {
              $id = $_POST["deleteID"];

              $deleteSql = "DELETE FROM `contact` WHERE `contactId`=$id";
              $result = mysqli_query($db, $deleteSql);

              if ($result) {
                echo '<div class="alert alert-success" role="alert">
                     The selected contact request is deleted.</div>';
              } else {
                echo '<div class="alert alert-danger" role="alert">
                      Contact request is not deleted</div>';
                echo mysqli_error($db);
              }
            }

            if (isset($_POST['approveBtn'])) {
              $id = $_POST["approveId"];

              $approveSql = "UPDATE `contact` SET `contactStatus`='Replied' WHERE `contactId`='$id'";
              $result = mysqli_query($db, $approveSql);

              if ($result) {
                echo '<div class="alert alert-success" role="alert">
           The selected contact status is updated.</div>';
              } else {
                echo '<div class="alert alert-danger" role="alert">
            Status is not updated</div>';
                echo mysqli_error($db);
              }
            }
            ?>
            <div class="table-responsive">
              <table class="table table-ticket table-bordered table-hover" id="dataTableID">
                <thead>
                  <tr>
                    <th scope="col" width="8%">Contact ID</th>
                    <th scope="col" class="d-none">ID</th>
                    <th scope="col">Contact Name</th>
                    <th scope="col">Contact Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Status</th>
                    <th scope="col" width="12%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $viewSql = "SELECT * FROM `contact`";
                  $result = mysqli_query($db, $viewSql);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $pre = $row['contactPrefix'];
                    $id = $row['contactId'];
                    $name = $row['contactName'];
                    $email = $row['contactEmail'];
                    $sbj = $row['contactSubject'];
                    $msg = $row['contactMessage'];
                    $status = $row['contactStatus'];

                    if ($status === 'Replied') {
                      $disabled = 'disabled';
                      $none = 'none';
                    } else {
                      $disabled = '';
                      $none = '';
                    }
                  ?>
                    <tr>
                      <td><?php echo $pre . "" . $id; ?></td>
                      <td class="d-none"><?php echo $id; ?></td>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $sbj; ?></td>
                      <td><?php echo $status; ?></td>
                      <td class="action-button">
                        <button type="button" class="btn view" data-bs-toggle="modal" data-bs-target="#view<?php echo $id; ?>">
                          <img src="./assets/img/lineIcon/eye.svg"></button>
                        <a href="mailto:<?php echo $email; ?>" style="pointer-events:<?php echo $none ?>;">
                          <button type="button" <?php echo $disabled ?> class="btn edit" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id; ?>">
                            <img src="./assets/img/lineIcon/pencil.svg"></button>
                        </a>
                        <button type="button" <?php echo $disabled; ?> class="btn approve" data-bs-toggle="modal" data-bs-target="#approve<?php echo $id; ?>">
                          <img src="./assets/img/lineIcon/check.svg"></button>
                        <button type="button" <?php echo $disabled; ?> class="btn delete" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id; ?>">
                          <img src="./assets/img/lineIcon/trash.svg"></button>
                      </td>
                    </tr>
                    <div class="modal fade text-dark" id="view<?php echo $id; ?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">View Contact Request <?php echo $pre . "" . $id; ?></h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <form action="" method="POST">
                                  <div class="mb-3">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Contact Name</label>
                                    <input type="text" class="form-control px-2 border border-secondary rounded" value="<?php echo $name; ?>" readonly></textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Contact Email</label>
                                    <input type="text" class="form-control px-2 border border-secondary rounded" value="<?php echo $email; ?>" readonly></textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control px-2 border border-secondary rounded" value="<?php echo $sbj; ?>" readonly></textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea type="text" class="form-control px-2 border border-secondary rounded" rows="7" readonly><?php echo $msg; ?></textarea>
                                  </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
                                Are you sure that you want to delete the selected contact request - <?php echo $pre . "" . $id; ?>?
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
                    <!-- Done Reply Ticket -->
                    <div class="modal fade text-dark" id="approve<?php echo $id; ?>" aria-hidden="true">
                      <div class="modal-dialog ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="acceptDataLabel">Contact Request Confirmation Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST">
                              <div class="mb-3">
                                <span>Have you replied to the below contact message?</span>
                              </div>
                              <div class="mb-3">
                                <input type="hidden" name="approveId" value="<?php echo $id; ?>">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Contact ID</label>
                                <input type="text" class="form-control px-2 border border-secondary rounded" value="<?php echo $pre . "" . $id; ?>" readonly>
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control px-2 border border-secondary rounded" value="<?php echo $sbj; ?>" readonly>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea class="form-control px-2 border border-secondary rounded" rows="7" readonly><?php echo $msg; ?></textarea>
                                </select>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="approveBtn">Yes</button>
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