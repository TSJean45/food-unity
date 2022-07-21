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
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" novalidate>
                                    <h4 class="text-center form-section-title">Restaurant's Detail</h4>
                                    <div class="shape form-shape"></div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01" class="form-input-title"><b>Restaurant Name</b></label>
                                            <input type="text" class="form-control" id="validationCustom01" required>
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
                                            <label for="validationCustom03" class="form-input-title"><b>Restaurant Address</b></label>
                                            <input type="text" class="form-control" id="validationCustom03" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid address.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom04" class="form-input-title"><b>State</b></label>
                                            <input type="text" class="form-control" id="validationCustom04" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom05" class="form-input-title"><b>Zip</b></label>
                                            <input type="text" class="form-control" id="validationCustom05" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid zip.
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="text-center form-section-title">Submitter's Detail</h4>
                                    <div class="shape form-shape"></div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03" class="form-input-title"><b>Name</b></label>
                                            <input type="text" class="form-control" id="validationCustom03" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid name.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom04" class="form-input-title"><b>Phone Number</b></label>
                                            <input type="text" class="form-control" id="validationCustom04" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom05" class="form-input-title"><b>Designation</b></label>
                                            <input type="text" class="form-control" id="validationCustom05" required>
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
                                    <button class="btn btn-primary" type="submit">Submit Food Unity Champaign Ticket</button>
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