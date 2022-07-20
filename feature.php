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
                <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Who Are You?</h2>
                <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a href="restaurantStaff.php">
                            <div class="card card-feature shadow-lg text-white">
                                <img src="./assets/img/feature/restaurantStaff.svg" class="card-img card-img-choice" alt="...">
                                <div class="card-img-overlay d-flex flex-column justify-content-end text-center">
                                    <h5 class="card-title title-choice">Restaurant Staff</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
                        <a href="public.php">
                            <div class="card card-feature shadow-lg text-white">
                                <img src="./assets/img/feature/customer.svg" class="card-img card-img-choice" alt="...">
                                <div class="card-img-overlay d-flex flex-column justify-content-end text-center">
                                    <h5 class="card-title title-choice">General Public</h5>
                                </div>
                            </div>
                        </a>
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

</html>