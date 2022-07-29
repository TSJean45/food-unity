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
                <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">On closing shift and have leftover food? Submit a Food Unity tickets now!</h2>
                <div class=" wow fadeInDown" data-wow-delay="0.3s"></div>
            </div>
            <div class="container mb-5">
                <div class="col-sm-12">
                    <div class="card wow fadeInUp">
                        <div class="card-body">
                            <?php
                            // Add Data
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
VALUES ('$resTime','$resAddress','$subName','$subNumber','$subDesign','Pending','$resPax','$resNote','$subPassword','$date','$resLat','$resLong')";
                                $result = mysqli_query($db, $sql);

                                if ($result) {
                                    echo '<div class="alert alert-success" role="alert">
Ticket is submitted</div>';
                                    // header("location:index.php");
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">
Ticket is not submitted</div>';
                                }

                                $month = date('m');
                                $day = date('d');
                                $year = date('Y');

                                $today = $year . '-' . $month . '-' . $day;
                            } ?>
                            <form class="needs-validation" novalidate action="" method="POST">
                                <h4 class="text-center form-section-title">Restaurant's Detail</h4>
                                <div class="shape form-shape"></div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="restaurantAddress" class="form-input-title"><b>Restaurant Full Address</b></label>
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
                                        <small id="passwordHelp" class="form-text text-muted">Estimate how many people will the food be enough for?</small>
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
                                        <textarea class="form-control" name="restaurantNote"></textarea>
                                        <small id="passwordHelp" class="form-text text-muted">Note to instruct the public on where and how to claim leftover food in your restaurant.</small>
                                        <div class="invalid-feedback">
                                            Please provide a valid note.
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
                                        <input type="tel" class="form-control" name="submitterNumber" required>
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
                                        <label for="submitterPassword" class="form-input-title"><b>Verification Password</b></label>
                                        <input type="password" class="form-control" name="submitterPassword" required>
                                        <small id="passwordHelp" class="form-text text-muted">Verification password is needed to end and edit the campaign.</small>
                                        <div class="invalid-feedback">
                                            Please provide a valid password.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            I understand that further modification of the restaurant location and the submitter's details are not allowed.
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            I have read and double check all of the information filled in the form.
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit" name="submitTicket">Submit Food Unity Campaign Ticket</button>
                            </form>
                        </div>
                    </div>
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