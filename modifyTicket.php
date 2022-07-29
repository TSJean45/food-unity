<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./assets/includes/head.php'); ?>
</head>

<body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
        <!-- Navbar Start -->
        <?php $page = 'feature';
        include('./assets/includes/navBar.php'); ?>
        <!-- Navbar End -->

        <div id="hero-area-lessPad" class="hero-area-bg">
            <div class="section-header text-center">
                <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Edit Food Unity Campaign Detail</h2>
                <div class=" wow fadeInDown" data-wow-delay="0.3s"></div>
            </div>
            <div class="container mb-5">

                <div class="alert alert-danger wow fadeInDown" role="alert">
                    Note: Please cancel and resubmit a new ticket if you have entered the wrong uneditable information.
                </div>
                <div class="col-sm-12">
                    <?php
                    if (isset($_POST['endBtn'])) {
                        $id = $_POST["endId"];

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

                    if (isset($_POST['deleteBtn'])) {
                        $id = $_POST["deleteID"];

                        $deleteSql = "DELETE FROM `restaurantTicket` WHERE `ticketId`=$id";
                        $result = mysqli_query($db, $deleteSql);

                        if ($result) {
                            echo '<div class="alert alert-success" role="alert">
 The selected ticket has cancelled. Redirecting...</div>';
                            echo "<script>
                                                    window.setTimeout(function() {
                                                        window.location.href = 'ticket.php' ;
                                                    }, 2000);</script>";
                        } else {
                            echo '<div class="alert alert-danger" role="alert">
  Ticket is not cancelled</div>';
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
                    } ?>
                    <div class="card wow fadeInUp">
                        <div class="card-body">
                            <?php
                            $id = $_GET["id"];

                            $viewSql = "SELECT * FROM `restaurantTicket` where ticketId = '$id'";
                            $result = mysqli_query($db, $viewSql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $pre = $row['ticketPrefix'];
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
                                $date = $row['ticketDate'];

                                if ($status === 'Ended') {
                                    $readonly = 'readonly';
                                    $disabled = 'disabled';
                                } else {
                                    $readonly = '';
                                    $disabled = '';
                                }


                            ?>
                                <form class="needs-validation" novalidate action="" method="POST">
                                    <h4 class="text-center form-section-title">Restaurant's Detail</h4>
                                    <div class="shape form-shape"></div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="restaurantId" class="form-input-title"><b>Restaurant ID</b></label>
                                            <input type="text" class="form-control" name="restaurantId" readonly value="<?php echo $pre . '' . $id; ?>">
                                            <input type="hidden" class="form-control" name="editId" value="<?php echo $id; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="restaurantAddress" class="form-input-title"><b>Restaurant Full Address</b></label>
                                            <input type="text" class="form-control" id="restaurantAddress" name="restaurantAddress" readonly value="<?php echo $resAdd; ?>">
                                            <div class="invalid-feedback">
                                                Please provide a valid address.
                                            </div>
                                            <input type="hidden" class="form-control" id="restaurantLat" name="restaurantLat">
                                            <input type="hidden" class="form-control" id="restaurantLong" name="restaurantLong">
                                        </div>
                                    </div>
                                    <h4 class="text-center form-section-title">Submitter's Detail</h4>
                                    <div class="shape form-shape"></div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="submitterName" class="form-input-title"><b>Name</b></label>
                                            <input type="text" class="form-control" name="submitterName" value="<?php echo $subName ?>" readonly>
                                            <div class="invalid-feedback">
                                                Please provide a valid name.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="submitterNumber" class="form-input-title"><b>Phone Number</b></label>
                                            <input type="tel" class="form-control" name="submitterNumber" value="<?php echo $subNum ?>" placeholder="01234398454" readonly>
                                            <div class="invalid-feedback">
                                                Please provide a valid phone number.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="submitterDesignation" class="form-input-title"><b>Designation</b></label>
                                            <input type="text" class="form-control" name="submitterDesignation" value="<?php echo $subDesign ?>" readonly>
                                            <div class="invalid-feedback">
                                                Please provide a valid designation.
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <h4 class="text-center form-section-title">Edit Form</h4>
                                <div class="shape form-shape"></div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-input-title"><b>Event Action</b></label><br>
                                    <button class="btn btn-warning btn-disabled" <?php echo $disabled ?> data-bs-toggle="modal" data-bs-target="#end">End Campaign</button>
                                    <button class="btn btn-danger btn-disabled" <?php echo $disabled ?> data-bs-toggle="modal" data-bs-target="#cancel">Cancel Campaign</button>
                                </div>
                                <form class="needs-validation" novalidate action="" method="POST">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editRestaurantDate" class="form-input-title"><b>Date</b></label>
                                            <input type="date" class="form-control" name="editRestaurantDate" <?php echo $readonly ?> min="<?php echo date("Y-m-d"); ?>" value="<?php echo $date ?>" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid date.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editRestaurantTime" class="form-input-title"><b>What time will the campaign end?</b></label>
                                            <input type="time" class="form-control" name="editRestaurantTime" <?php echo $readonly ?> value="<?php echo $resTime ?>" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid time.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editRestaurantPax" class="form-input-title"><b>Estimated pax?</b></label>
                                            <input type="text" class="form-control" name="editRestaurantPax" <?php echo $readonly ?> value="<?php echo $resPax ?>" placeholder="20-30" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid range.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="editRestaurantNote" class="form-input-title"><b>Note (Optional)</b></label>
                                            <textarea class="form-control" name="editRestaurantNote" <?php echo $readonly ?> placeholder="Enter notes that is important to clarify to the public."><?php echo $resNote; ?></textarea>

                                            <div class="invalid-feedback">
                                                Please provide a valid range.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row-reverse">
                                        <button class="btn btn-primary mx-2 btn-disabled" <?php echo $disabled ?> type="submit" name="editBtn">Save Changes</button>
                                        <a class="btn btn-secondary mx-2" href="ticket.php">Return To Tickets</a>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <!-- Cancel Ticket -->
        <div class="modal fade text-dark" role="dialog" id="cancel" aria-hidden="true">
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
                                Are you sure that you want to cancel the selected campaign - <?php echo $pre . "" . $id; ?>?
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
        <!-- End Ticket -->
        <div class="modal fade text-dark" role="dialog" id="end" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteDataLabel">Confirmation Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="endId" value="<?php echo $id; ?>">
                            </div>
                            <div class="mb-3">
                                Are you sure that you want to end the selected campaign early - <?php echo $pre . "" . $id; ?>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="endBtn">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section Start -->
        <?php include('./assets/includes/footer.php') ?>
        <!-- Footer Section End -->

        <!-- Preloader -->
        <div id="preloader">
            <div class="loader" id="loader-1"></div>
        </div>
        <!-- End Preloader -->

        <?php include('./assets/includes/body.php'); ?>

        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCwx_fIF6BS-yIhlmZWVDyubiZVQQQj3TU&callback=initMap" async defer></script>
        <script src="./assets/js/autocompleteGoogleMap.js"></script>
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