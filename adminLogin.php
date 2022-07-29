<?php
include 'connection.php';
session_start();
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
                            <div class="col-md-9 col-lg-6 col-xl-6">
                                <img src="./assets/img/adminLogin.svg" style="width: 500px;" alt="Sample image">
                            </div>
                            <div class="col-md-8 col-lg-6 col-xl-6">
                                <div class="card shadow-lg  card-login">
                                    <div class="card-body">

                                        <div class="text-center">
                                            <img src="./assets/img/logoLeaf.png" style="width: 50px;" alt="logo">
                                            <h4 class="mt-1 mb-5">We Are The Brain @Admin</h4>
                                        </div>
                                        <?php
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            $email = $_POST["adminEmail"];
                                            $password = $_POST["adminPassword"];

                                            $sql = "SELECT * FROM admin WHERE adminEmail = '$email' AND adminPassword= '$password'";
                                            $result = mysqli_query($db, $sql);
                                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                            $count = mysqli_num_rows($result);

                                            if ($result) {
                                                if ($count == 1) {
                                                    $_SESSION['adminId'] = $row['adminId'];
                                                    echo '<div class="alert alert-success" role="alert">
                                                    Logging in...</div>';
                                                    echo "<script>

                                                    window.setTimeout(function() {
                                                        window.location.href = 'adminDashboard.php' ;
                                                    }, 2000);</script>";
                                                } else {
                                                    echo '<div class="alert alert-danger" role="alert">
                                                    Username or Password Incorrect.</div>';
                                                }
                                            } else {
                                                echo 'alert("connection error")';
                                            }
                                        }
                                        ?>
                                        <form action="" method="post">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">

                                                <label class="form-label" for="form3Example3">Email address</label>
                                                <input type="email" id="form3Example3" name="adminEmail" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-3">

                                                <label class="form-label" for="form3Example4">Password</label>
                                                <input type="password" id="form3Example4" name="adminPassword" class="form-control form-control-lg" placeholder="Enter password" />
                                            </div>

                                            <div class="text-center text-lg-start mt-4 pt-2">
                                                <button type="submit" name="loginBtn" class="btn btn-common btn-lg">Login</button>
                                            </div>
                                        </form>
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