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
            <div class="container">
                <div class="col-sm-12">
                    <div class="card wow fadeInUp">
                        <div class="card-body">
                            <?php
                            // Add Data
                            if (isset($_POST["submitTicket"])) {
                                $resName = $_POST["restaurantName"];
                                $resTime = $_POST["restaurantTime"];
                                $resAddress = $_POST["restaurantAddress"];
                                $restState = $_POST["restaurantState"];
                                $resZip = $_POST["restaurantZip"];
                                $subName = $_POST["submitterName"];
                                $subNumber = $_POST["submitterNumber"];
                                $subDesign = $_POST["submitterDesignation"];

                                $sql = "INSERT INTO restaurantTicket (ticketRestaurantName,ticketRestaurantTime,ticketRestaurantAddress,ticketRestaurantState,ticketRestaurantZip,ticketSubmitterName,ticketSubmitterNumber,ticketSubmitterDesignation) 
VALUES ('$resName','$resTime','$resAddress','$restState','$resZip','$subName','$subNumber','$subDesign')";
                                $result = mysqli_query($db, $sql);

                                if ($result) {
                                    echo '<div class="alert alert-success" role="alert">
Ticket submitted successfully.</div>';
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">
Ticket is not submitted</div>';
                                    echo mysqli_error($db);
                                }
                            } ?>
                            <form class="needs-validation" novalidate action="" method="POST">
                                <h4 class="text-center form-section-title">Restaurant's Detail</h4>
                                <div class="shape form-shape"></div>
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <label for="restaurantName" class="form-input-title"><b>Restaurant Name</b></label>
                                        <input type="text" class="form-control" name="restaurantName" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a valid restaurant name.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="restaurantTime" class="form-input-title"><b>What time will you stay until?</b></label>
                                        <input type="time" class="form-control" name="restaurantTime" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide a valid restaurant name.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="restaurantAddress" class="form-input-title"><b>Restaurant Address</b></label>
                                        <input type="text" class="form-control" name="restaurantAddress" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid address.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="restaurantState" class="form-input-title"><b>State</b></label>
                                        <input type="text" class="form-control" name="restaurantState" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="restaurantZip" class="form-input-title"><b>Zip</b></label>
                                        <input type="number" class="form-control" name="restaurantZip" min="11111" max="99999" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid zip.
                                        </div>
                                    </div>
                                </div>
                                <h4 class="text-center form-section-title">Submitter's Detail</h4>
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
                                        <input type="tel" class="form-control" name="submitterNumber" pattern="[0-9]{11}" placeholder="01234398454" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="submitterDesignation" class="form-input-title"><b>Designation</b></label>
                                        <input type="text" class="form-control" name="submitterDesignation" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid zip.
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
                                <button class="btn btn-primary" type="submit" name="submitTicket">Submit Food Unity Champaign Ticket</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Preloader -->
        <div id="preloader">
            <div class="loader" id="loader-1"></div>
        </div>
        <!-- End Preloader -->

        <?php include('./assets/includes/body.php'); ?>

</body>

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

</html>