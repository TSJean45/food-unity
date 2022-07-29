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
        <?php $page = 'ticket';
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
                    <span class="dashboardTitle">Ticket</span>

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
                        <div class="d-flex flex-row-reverse">
                            <div class="mx-1">
                                <!-- <a href="addModal.php" class="btn btn-success float-right li-modal">
                                    Add Ticket
                                </a> -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTicket">
                                    Add Ticket</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST["submitTicket"])) {
                        $resTime = $_POST["restaurantTime"];
                        $resAddress = $_POST["restaurantAddress"];
                        $resPax = $_POST["restaurantPax"];
                        $resNote = $_POST["restaurantNote"];
                        $subName = $_POST["submitterName"];
                        $subNumber = $_POST["submitterNumber"];
                        $subDesign = $_POST["submitterDesignation"];
                        $subPassword = $_POST["submitterPassword"];
                        $resLat = $_POST["restaurantLat"];
                        $resLong = $_POST["restaurantLong"];
                        $date = $_POST["restaurantDate"];

                        $sql = "INSERT INTO restaurantTicket (restaurantEndTime,restaurantAddress,submitterName,submitterNumber,submitterDesignation,ticketStatus,restaurantPax,restaurantNote,submitterPassword,ticketDate,restaurantLat,restaurantLong) 
VALUES ('$resTime','$resAddress','$subName','$subNumber','$subDesign','Running','$resPax','$resNote','$subPassword','$date','$resLat','$resLong')";
                        $result = mysqli_query($db, $sql);

                        if ($result) {
                            echo '<div class="alert alert-success" role="alert">
Ticket is added</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
Ticket is not added</div>';
                            echo mysqli_error($db);
                        }
                    }

                    if (isset($_POST['deleteBtn'])) {
                        $id = $_POST["deleteID"];

                        $deleteSql = "DELETE FROM `restaurantTicket` WHERE `ticketId`=$id";
                        $result = mysqli_query($db, $deleteSql);

                        if ($result) {
                            echo '<div class="alert alert-success" role="alert">
                     The selected data is deleted.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                      Data is not deleted</div>';
                            echo mysqli_error($db);
                        }
                    }

                    if (isset($_POST['approveBtn'])) {
                        $id = $_POST["approveId"];

                        $approveSql = "UPDATE `restaurantTicket` SET `ticketStatus`='Running' WHERE `ticketId`='$id'";
                        $result = mysqli_query($db, $approveSql);

                        if ($result) {
                            echo '<div class="alert alert-success" role="alert">
                     The selected ticket is approved.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                      Ticket is not approved</div>';
                            echo mysqli_error($db);
                        }
                    }

                    if (isset($_POST['editBtn'])) {
                        $id = $_POST["editId"];
                        $resTime = $_POST["editRestaurantTime"];
                        $resPax = $_POST["editRestaurantPax"];
                        $resNote = $_POST["editRestaurantNote"];
                        $date = $_POST["editRestaurantDate"];

                        $approveSql = "UPDATE `restaurantTicket` SET `restaurantEndTime`='$resTime', `restaurantPax`='$resPax'
                        , `restaurantNote`='$resNote', `ticketDate`='$date' WHERE `ticketId`='$id'";
                        $result = mysqli_query($db, $approveSql);

                        if ($result) {
                            echo '<div class="alert alert-success" role="alert">
                     The selected ticket is edited.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                      Ticket is not edited</div>';
                            echo mysqli_error($db);
                        }
                    }

                    if (isset($_POST['endBtn'])) {
                        $id = $_POST["editId"];

                        $approveSql = "UPDATE `restaurantTicket` SET `ticketStatus`='Ended' WHERE `ticketId`='$id'";
                        $result = mysqli_query($db, $approveSql);

                        if ($result) {
                            echo '<div class="alert alert-success" role="alert">
                     The selected ticket has ended.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
                      Ticket is not ended</div>';
                            echo mysqli_error($db);
                        }
                    }
                    ?>
                    <div class="table-responsive">

                        <table class="table table-ticket table-bordered table-hover" id="dataTableID">
                            <thead>
                                <tr>
                                    <th scope="col" width="7%">Ticket ID</th>
                                    <th scope="col" class="d-none">ID</th>
                                    <th scope="col" width=" 50%">Restaurant Full Address</th>
                                    <th scope="col">Restaurant Closing Time</th>
                                    <th scope="col">Submitter Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" width="12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $viewSql = "SELECT * FROM `restaurantTicket`";
                                $result = mysqli_query($db, $viewSql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $pre = $row['ticketPrefix'];
                                    $id = $row['ticketId'];
                                    $resName = $row['restaurantName'];
                                    $resAdd = $row['restaurantAddress'];
                                    $resTime = $row['restaurantEndTime'];
                                    $resNote = $row['restaurantNote'];
                                    $subName = $row['submitterName'];
                                    $subNum = $row['submitterNumber'];
                                    $subDesign = $row['submitterDesignation'];
                                    $status = $row['ticketStatus'];
                                    $lat = $row['restaurantLat'];
                                    $long = $row['restaurantLong'];
                                    $resPax = $row['restaurantPax'];
                                    $subPassword = $row['submitterPassword'];
                                    $date = $row['ticketDate'];
                                    $currentDate = date("Y-m-d");
                                    $filterAdd = preg_replace('/\s+/', '%', $resAdd);

                                    if ($status === 'Pending') {
                                        $alert = 'alert-warning';
                                        $approve = '';
                                        $edit = '';
                                        $delete = '';
                                    } else if ($status === 'Running') {
                                        $alert = 'alert-success';
                                        $approve = 'disabled';
                                        $edit = '';
                                        $delete = '';
                                    } else if ($status === 'Ended') {
                                        $alert = 'alert-secondary';
                                        $approve = 'disabled';
                                        $edit = 'disabled';
                                        $delete = 'disabled';
                                    }

                                ?>
                                    <tr>
                                        <td><?php echo $pre . "" . $id; ?></td>
                                        <td class="d-none"><?php echo $id; ?></td>
                                        <td><?php echo $resAdd; ?></td>
                                        <td><?php echo $date . "," . $resTime; ?></td>
                                        <td><?php echo $subName; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td class="action-button">
                                            <button type="button" class="btn view" data-bs-toggle="modal" data-bs-target="#view<?php echo $id; ?>">
                                                <img src="./assets/img/lineIcon/eye.svg"></button>
                                            <button type="button" <?php echo $approve ?> class="btn approve" data-bs-toggle="modal" data-bs-target="#approve<?php echo $id; ?>">
                                                <img src="./assets/img/lineIcon/check.svg"></button>
                                            <button type="button" <?php echo $edit ?> class="btn edit" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id; ?>">
                                                <img src="./assets/img/lineIcon/pen.svg"></button>
                                            <button type="button" <?php echo $delete ?> class="btn delete" data-bs-toggle="modal" data-bs-target="#delete<?php echo $id; ?>">
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
                                                            Are you sure that you want to delete the selected ticket - <?php echo $pre . "" . $id; ?>?
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
                                    <!-- View Ticket -->
                                    <div class="modal fade text-dark" id="view<?php echo $id; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-size">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">View Campaign Ticket <?php echo $pre . "" . $id; ?></h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <form action="" method="POST">
                                                                <div class="mb-3">
                                                                    <div class="alert <?php echo $alert; ?>" role="alert">
                                                                        <?php echo $status; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Restaurant Full Address</label>
                                                                    <textarea type="text" class="form-control-plaintext px-2 border border-secondary rounded" readonly><?php echo $resAdd; ?></textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6 mb-3">
                                                                        <label class="form-label">Date And Time Ended</label>
                                                                        <input type="text" class="form-control-plaintext px-2 border border-secondary rounded" value="<?php echo $date . "," . $resTime; ?>" readonly>
                                                                    </div>
                                                                    <div class="col-lg-6 mb-3">
                                                                        <label class="form-label">Range of Pax Available</label>
                                                                        <input type="text" class="form-control-plaintext px-2 border border-secondary rounded" value="<?php echo $resPax; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Note</label>
                                                                    <textarea type="text" class="form-control-plaintext px-2 border border-secondary rounded" readonly><?php echo $resNote; ?></textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4 mb-3"> <label class="form-label">Submitter Name</label>
                                                                        <input type="text" class="form-control-plaintext px-2 border border-secondary rounded" value="<?php echo $subName; ?>" readonly>
                                                                    </div>
                                                                    <div class="col-lg-4 mb-3">
                                                                        <label class="form-label">Submitter Number</label>
                                                                        <input type="text" class="form-control-plaintext px-2 border border-secondary rounded" value="<?php echo $subNum; ?>" readonly>
                                                                    </div>
                                                                    <div class="col-lg-4 mb-3">
                                                                        <label class="form-label">Submitter Designation</label>
                                                                        <input type="text" class="form-control-plaintext px-2 border border-secondary rounded" value="<?php echo $subDesign; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCwx_fIF6BS-yIhlmZWVDyubiZVQQQj3TU&q=<?php echo $filterAdd; ?>">
                                                                </iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Approve Ticket -->
                                    <div class="modal fade text-dark" id="approve<?php echo $id; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-size">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="acceptDataLabel">Campaign Ticket Confirmation Message</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST">
                                                        <div class="mb-3">
                                                            <span>Would you like to approve the ticket below?</span>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="hidden" name="approveId" value="<?php echo $id; ?>">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4 mb-3">
                                                                <label class="form-label">Ticket ID</label>
                                                                <input type="text" class="form-control px-2 border border-secondary rounded" value="<?php echo $pre . "" . $id; ?>" readonly>
                                                            </div>
                                                            <div class="col-lg-8 mb-3">
                                                                <label class="form-label">Restaurant Address</label>
                                                                <input type="text" class="form-control px-2 border border-secondary rounded" value="<?php echo $resAdd; ?>" readonly>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" name="approveBtn">Approve</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Ticket -->
                                    <div class="modal fade text-black" id="edit<?php echo $id; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-size">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editData">Edit Campaign Ticket</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST">
                                                        <h4 class="text-center form-section-title">Restaurant's Detail</h4>
                                                        <div class="shape form-shape"></div>
                                                        <div class="mb-3">
                                                            <input type="hidden" name="editId" value="<?php echo $id; ?>">
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-4 mb-3">
                                                                <label for="editRestaurantPax" class="form-input-title"><b>Estimated pax?</b></label>
                                                                <input type="text" class="form-control" name="editRestaurantPax" value="<?php echo $resPax; ?>" placeholder="20-30" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid range.
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="editRestaurantDate" class="form-input-title"><b>Date</b></label>
                                                                <input type="date" class="form-control" name="editRestaurantDate" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $date; ?>" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid date.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="editRestaurantTime" class="form-input-title"><b>What time will the campaign end?</b></label>
                                                                <input type="time" class="form-control" name="editRestaurantTime" value="<?php echo $resTime; ?>" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid time.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="editRestaurantNote" class="form-input-title"><b>Note (Optional)</b></label>
                                                                <textarea class="form-control" name="editRestaurantNote" placeholder="Enter notes that is important to clarify to the public."><?php echo $resNote; ?></textarea>

                                                                <div class="invalid-feedback">
                                                                    Please provide a valid range.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="editRestaurantAddress" class="form-input-title"><b>Restaurant Address</b></label>
                                                                <input type="text" class="form-control" id="editRestaurantAddress" name="editRestaurantAddress" value="<?php echo $resAdd; ?>" required readonly>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid address.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="text-center form-section-title">Restaurant Staff's Detail</h4>
                                                        <div class="shape form-shape"></div>
                                                        <div class="form-row">
                                                            <div class="col-md-4 mb-3">
                                                                <label for="editSubmitterName" class="form-input-title"><b>Name</b></label>
                                                                <input type="text" class="form-control" name="editSubmitterName" value="<?php echo $subName; ?>" readonly>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid name.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="editSubmitterNumber" class="form-input-title"><b>Phone Number</b></label>
                                                                <input type="tel" class="form-control" name="editSubmitterNumber" value="<?php echo $subNum; ?>" placeholder="01234398454" readonly>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid phone number.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label for="editSubmitterDesignation" class="form-input-title"><b>Designation</b></label>
                                                                <input type="text" class="form-control" name="editSubmitterDesignation" value="<?php echo $subDesign; ?>" readonly>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid designation.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                            <button class="btn btn-success" type="submit" name="editBtn">Save Changes</button>
                                                            <button class="btn btn-warning" type="submit" name="endBtn">End Campaign</button>
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
                <div class="modal-dialog modal-size">
                    <div class="modal-content">

                        <body>
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Ticket</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <h4 class="text-center form-section-title">Restaurant's Detail</h4>
                                    <div class="shape form-shape"></div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="restaurantAddress" class="form-input-title"><b>Restaurant Address</b></label>
                                            <input type="text" class="form-control" id="restaurantAddress" name="restaurantAddress" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid address.
                                            </div>
                                            <div id="map"></div>
                                            <input type="hidden" class="form-control" id="restaurantLat" name="restaurantLat">
                                            <input type="hidden" class="form-control" id="restaurantLong" name="restaurantLong">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="restaurantPax" class="form-input-title"><b>Estimated pax?</b></label>
                                            <input type="text" class="form-control" name="restaurantPax" placeholder="20-30" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid range.
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="restaurantDate" class="form-input-title"><b>Date</b></label>
                                            <input type="date" class="form-control" name="restaurantDate" min="<?php echo date("Y-m-d"); ?>" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid date.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="restaurantTime" class="form-input-title"><b>What time will the campaign end?</b></label>
                                            <input type="time" class="form-control" name="restaurantTime" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid time.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="restaurantNote" class="form-input-title"><b>Note (Optional)</b></label>
                                            <textarea class="form-control" name="restaurantNote" placeholder="Enter notes that is important to clarify to the public."></textarea>

                                            <div class="invalid-feedback">
                                                Please provide a valid range.
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="text-center form-section-title">Restaurant Staff's Detail</h4>
                                    <div class="shape form-shape"></div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="submitterName" class="form-input-title"><b>Name</b></label>
                                            <input type="text" class="form-control" name="submitterName" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid name.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="submitterNumber" class="form-input-title"><b>Phone Number</b></label>
                                            <input type="tel" class="form-control" name="submitterNumber" placeholder="01234398454" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid phone number.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="submitterDesignation" class="form-input-title"><b>Designation</b></label>
                                            <input type="text" class="form-control" name="submitterDesignation" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid designation.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="submitterPassword" class="form-input-title"><b>Password</b></label>
                                            <input type="password" class="form-control" name="submitterPassword" required>
                                            <small id="passwordHelp" class="form-text text-muted">Password is important to end or edit the campaign.</small>
                                            <div class="invalid-feedback">
                                                Please provide a valid password.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                            <label class="form-check-label" for="invalidCheck">
                                                Agree to terms and conditions
                                            </label>
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit" name="submitTicket">Submit Food Unity Campaign Ticket</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

            <!-- End of Main Content -->

            <?php include('./assets/includes/body.php'); ?>

            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCwx_fIF6BS-yIhlmZWVDyubiZVQQQj3TU&callback=initMap" async defer></script>
            <script src="./assets/js/autocompleteGoogleMap.js"></script>

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