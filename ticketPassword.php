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
            <div class="container">
                <section class="vh-100">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-md-12 col-lg-6 col-xl-6">
                                <div class="card shadow-lg  card-password">
                                    <div class="card-body">


                                        <?php
                                        $id = $_GET["id"];
                                        $viewSql = "SELECT * FROM `restaurantTicket` where ticketId = '$id'";
                                        $result = mysqli_query($db, $viewSql);

                                        if (isset($_POST["submitPass"])) {
                                            $password = $_POST["subPassword"];

                                            $sql = "SELECT * FROM restaurantTicket WHERE ticketId = '$id' AND submitterPassword= '$password'";
                                            $result = mysqli_query($db, $sql);
                                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                            $count = mysqli_num_rows($result);

                                            if ($result) {
                                                if ($count == 1) {
                                                    echo '<div class="alert alert-success" role="alert">
                                                    Password correct. Redirecting...</div>';
                                                    echo "<script>

                                                    window.setTimeout(function() {
                                                        window.location.href = 'modifyTicket.php?id=" . $id . "' ;
                                                    }, 2000);</script>";
                                                } else {
                                                    echo '<div class="alert alert-danger" role="alert">
                                                    Password Incorrect. Redirecting...</div>';
                                                    echo "<script>

                                                    window.setTimeout(function() {
                                                        window.location.href = 'ticketPassword.php?id=" . $id . "' ;
                                                    }, 2000);</script>";
                                                }
                                            } else {
                                                echo 'alert("connection error")';
                                            }
                                        } ?>

                                        <?php while ($row = mysqli_fetch_assoc($result)) {
                                            $pre = $row['ticketPrefix'];
                                        ?>

                                            <div class="text-center">
                                                <img src="./assets/img/logoLeaf.png" style="width: 50px;" alt="logo">
                                                <h4 class="mt-1 mb-5">Food Unity Campaign <?php echo $pre . '' . $id ?></h4>
                                            </div>
                                            <?php
                                            ?>
                                            <form action="" method="post">
                                                <!-- Password input -->
                                                <div class="form-outline mb-3">

                                                    <label class="form-label" for="form3Example4">Password</label>
                                                    <input type="password" id="form3Example4" name="subPassword" class="form-control form-control-lg" placeholder="Enter password" />
                                                    <small id="passwordHelp" class="form-text text-muted">Verification password is needed to end and edit the campaign. Please send a contact request <a href="index.php#contact"> HERE </a> if you have forgotten your password.</small>
                                                </div>

                                                <div class="text-center text-lg-start mt-4 pt-2">
                                                    <button type="submit" name="submitPass" class="btn btn-common btn-lg">Submit Password</button>
                                                </div>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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