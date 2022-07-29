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
            <div class="container-fluid mb-5">

                <div id="mapError">
                </div>
                <div class="card shadow-lg">
                    <div class="row">
                        <div class="col-xl-7">
                            <div id="map" style="height: 100%;"></div>
                        </div>
                        <div class="col-xl-5 col-sm-12">
                            <div class="wow public-container fadeInUp">
                                <div class="card-body">
                                    <?php
                                    $viewSql = "SELECT * FROM `restaurantTicket` where ticketStatus = 'Running'";
                                    $result = mysqli_query($db, $viewSql);
                                    $count = mysqli_num_rows($result);

                                    if (mysqli_num_rows($result) == 0) {
                                        echo "<div class='alert alert-danger' role='alert'>
                                        There's currently no Food Unity campaign ongoing. If you're a restaurant staff, please head over 
                                        <a href='submitTicket.php'> HERE </a> to submit your ticket.
                                      </div>";
                                    } else {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $pre = $row['ticketPrefix'];
                                            $id = $row['ticketId'];
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
                                            $formatDate = date('j F Y',strtotime($date));
                                    ?>
                                            <div class="card border-info mb-4">
                                                <div class="card-header text-white bg-info ">
                                                    Campaign Ticket <?php echo $pre . "" . $id ?>
                                                </div>
                                                <div class="card-body text-body bg-transparent">
                                                    <h5 class="card-title"><?php echo $resAdd?></h5>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6 d-inline-flex">
                                                            <img src="./assets/img/lineIcon/calendar.svg" alt="">
                                                        <p class="card-text ml-3">Ends at <?php echo $formatDate .", ". $resTime ?></p>
                                                        </div>
                                                        <div class="col-md-6 d-inline-flex">
                                                        <img src="./assets/img/lineIcon/user.svg" alt="">
                                                        <p class="card-text ml-3"><?php echo $resPax?></p>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="card-link" data-toggle="modal" data-target="#viewLocation<?php echo $id; ?>">View Campaign Info</a>
                                                    <!-- <button href="#" class="btn card-link btn-primary" data-toggle="modal" data-target="#viewLocation<?php echo $id; ?>">View Campaign Info</button> -->
                                                </div>
                                            </div>
                                    <?php }
                                    }
                                    ?>

                                </div>
                            </div>
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
            $filterAdd = preg_replace('/\s+/', '%', $resAdd);
        ?>
            <div class="modal fade" id="viewLocation<?php echo $id; ?>" aria-hidden="true">
                <div class="modal-dialog modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editData">Campaign Info</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table table-bordered">
                                        <thead>
                                            <td colspan="2">Restaurant Info</td>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Restaurant Full Address</td>
                                                <td><?php echo $resAdd; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Food Campaign Ends At</td>
                                                <td><?php echo $resTime; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Estimated Pax </td>
                                                <td><?php echo $resPax; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Note </td>
                                                <td><?php echo $resNote; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered">
                                        <thead>
                                            <td colspan="2">Submitter Info</td>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Submitter Name </td>
                                                <td><?php echo $subName; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone Number </td>
                                                <td><?php echo $subNum ?></td>
                                            </tr>
                                            <tr>
                                                <td>Designation </td>
                                                <td><?php echo $subDesign; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <iframe width="550" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCwx_fIF6BS-yIhlmZWVDyubiZVQQQj3TU&q=<?php echo $filterAdd; ?>">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="ticketPassword.php?id=<?php echo $id ?>">
                                        <span>Click Here If You're The Submitter Of This Food Unity Campaigns</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php } ?>

        <?php include('./assets/includes/body.php'); ?>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCwx_fIF6BS-yIhlmZWVDyubiZVQQQj3TU&callback=initialize" async defer></script>
        <?php include('./assets/js/addMarker.php'); ?>
</body>

</html>