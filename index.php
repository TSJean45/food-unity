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
    <?php $page = 'index';
    include('./assets/includes/navBar.php'); ?>

    <!-- Navbar End -->

    <!-- Hero Area Start -->
    <div id="hero-area" class="hero-area-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
            <div class="contents">
              <h2 class="head-title wow fadeInDown">Never Waste Food<br>Ever Again</h2>
              <p class="wow fadeInDown">Why bin food when you can share it to the needy? Do your part right now to support a cause in food waste!</p>
              <div class="header-button wow fadeInUp">
                <a href="feature.php" class="btn btn-common">Get Started</i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div class="intro-img wow fadeInRight">
              <img class="img-fluid" src="assets/img/landingPage.svg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero Area End -->

  </header>
  <!-- Header Area wrapper End -->

  <!-- Objective Section Start -->
  <section id="about" class="section-padding">
    <div class="container">
      <div class="section-header text-center">
        <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Our Objectives</h2>
        <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
      </div>
      <div class="row">
        <!-- objectives item -->
        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="objectives-item wow fadeInRight" data-wow-delay="0.3s">
            <div class="icon">
              <i class="lni-cog"></i>
            </div>
            <div class="objectives-content">
              <h3><a href="#">Easy To View</a></h3>
              <p>Find the nearest restaurant that has leftover food with no hassle and no sign in required </p>
            </div>
          </div>
        </div>
        <!-- objectives item -->
        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="objectives-item wow fadeInRight" data-wow-delay="0.6s">
            <div class="icon">
              <i class="lni-stats-up"></i>
            </div>
            <div class="objectives-content">
              <h3><a href="#">Easy To Submit</a></h3>
              <p>Submit a ticket to share your restaurant's leftover food to the needy with no hassle and no sign in required </p>
            </div>
          </div>
        </div>
        <!-- objectives item -->
        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="objectives-item wow fadeInRight" data-wow-delay="0.9s">
            <div class="icon">
              <i class="lni-users"></i>
            </div>
            <div class="objectives-content">
              <h3><a href="#">Spread The Love</a></h3>
              <p>Spread love and share food to those who needs it </p>
            </div>
          </div>
        </div>
        <!-- objectives item -->
        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="objectives-item wow fadeInRight" data-wow-delay="1.2s">
            <div class="icon">
              <i class="lni-layers"></i>
            </div>
            <div class="objectives-content">
              <h3><a href="#">Solve Food Waste</a></h3>
              <p>A more effective way in solving food waste </p>
            </div>
          </div>
        </div>
        <!-- objectives item -->
        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="objectives-item wow fadeInRight" data-wow-delay="1.5s">
            <div class="icon">
              <i class="lni-mobile"></i>
            </div>
            <div class="objectives-content">
              <h3><a href="#">Reduce Leftover Food Waste</a></h3>
              <p>Share the food instead of disposing it </p>
            </div>
          </div>
        </div>
        <!-- objectives item -->
        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="objectives-item wow fadeInRight" data-wow-delay="1.8s">
            <div class="icon">
              <i class="lni-rocket"></i>
            </div>
            <div class="objectives-content">
              <h3><a href="#">User Friendly interface</a></h3>
              <p>A simple platform to navigate around easily </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- objectives Section End -->

  <!-- Features Section Start -->
  <section id="how" class="section-padding">
    <div class="container">
      <div class="section-header text-center">
        <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">How It Works</h2>
        <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <h2 class="section-how wow fadeInDown d-flex justify-content-start" data-wow-delay="0.3s">For The Restaurant Staff</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
          <div class="content-left">
            <div class="box-item wow fadeInLeft" data-wow-delay="0.3s">
              <span class="icon">
                <i class="lni-rocket"></i>
              </span>
              <div class="text">
                <h4>Step 1</h4>
                <p>Head over <a href='submitTicket.php'> HERE </a> to submit a campaign ticket.</p>
              </div>
            </div>
            <div class="box-item wow fadeInLeft" data-wow-delay="0.6s">
              <span class="icon">
                <i class="lni-laptop-phone"></i>
              </span>
              <div class="text">
                <h4>Step 2</h4>
                <p>Wait for your campaign ticket to be approved.</p>
              </div>
            </div>
            <div class="box-item wow fadeInLeft" data-wow-delay="0.9s">
              <span class="icon">
                <i class="lni-cog"></i>
              </span>
              <div class="text">
                <h4>Step 3</h4>
                <p>Check <a href='ticket.php'> HERE </a> to see your ticket submission </p>
              </div>
            </div>
            <div class="box-item wow fadeInLeft" data-wow-delay="0.9s">
              <span class="icon">
                <i class="lni-calendar"></i>
              </span>
              <div class="text">
                <h4>Step 4</h4>
                <p>Edit or end your campaign by navigating to the edit dashboard of the ticket </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <h2 class="section-how wow fadeInDown d-flex justify-content-end" data-wow-delay="0.3s">For The General Public</h2>
          <div class="shape wow fadeInDown " data-wow-delay="0.3s"></div>
          <div class="content-right">
            <div class="box-item wow fadeInRight" data-wow-delay="0.3s">
              <span class="icon">
                <i class="lni-pencil"></i>
              </span>
              <div class="text">
                <h4>Step 1</h4>
                <p>Head over <a href='ticket.php'> HERE </a> to view ongoing campaigns</p>
              </div>
            </div>
            <div class="box-item wow fadeInRight" data-wow-delay="0.6s">
              <span class="icon">
                <i class="lni-layers"></i>
              </span>
              <div class="text">
                <h4>Step 2</h4>
                <p>View campaign info to know more about the details</p>
              </div>
            </div>
            <div class="box-item wow fadeInRight" data-wow-delay="0.9s">
              <span class="icon">
                <i class="lni-leaf"></i>
              </span>
              <div class="text">
                <h4>Step 3</h4>
                <p>Get direction to the restaurant by viewing the campaign info</p>
              </div>
            </div>
            <div class="box-item wow fadeInRight" data-wow-delay="0.9s">
              <span class="icon">
                <i class="lni-phone"></i>
              </span>
              <div class="text">
                <h4>Step 4</h4>
                <p>Visit the restaurant and enjoy your food. Do call the organiser before hand to confirm the food availability</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Features Section End -->

  <!-- Testimonial Section Start -->
  <section id="testimonial" class="testimonial section-padding">
    <div class="container">
      <div class="section-header text-center">
        <h2 class="section-title wow text-white fadeInDown" data-wow-delay="0.3s">Testimonials</h2>
        <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div id="testimonials" class="owl-carousel wow fadeInUp" data-wow-delay="1.2s">
            <div class="item">
              <div class="testimonial-item">
                <div class="img-thumb">
                  <img src="assets/img/testimonial/img1.jpg" alt="">
                </div>
                <div class="info">
                  <h2><a href="#">David Smith</a></h2>
                  <h3><a href="#">Restaurant Staff</a></h3>
                </div>
                <div class="content">
                  <p class="description">Praesent cursus nulla non arcu tempor, ut egestas elit tempus. In ac ex fermentum, gravida felis nec, tincidunt ligula.</p>
                  <div class="star-icon mt-3">
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-half"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-item">
                <div class="img-thumb">
                  <img src="assets/img/testimonial/img2.jpg" alt="">
                </div>
                <div class="info">
                  <h2><a href="#">Domeni Gesson</a></h2>
                  <h3><a href="#">Restaurant Staff</a></h3>
                </div>
                <div class="content">
                  <p class="description">Praesent cursus nulla non arcu tempor, ut egestas elit tempus. In ac ex fermentum, gravida felis nec, tincidunt ligula.</p>
                  <div class="star-icon mt-3">
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-item">
                <div class="img-thumb">
                  <img src="assets/img/testimonial/img3.jpg" alt="">
                </div>
                <div class="info">
                  <h2><a href="#">Dommini Albert</a></h2>
                  <h3><a href="#">Office Worker</a></h3>
                </div>
                <div class="content">
                  <p class="description">Praesent cursus nulla non arcu tempor, ut egestas elit tempus. In ac ex fermentum, gravida felis nec, tincidunt ligula.</p>
                  <div class="star-icon mt-3">
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-half"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimonial-item">
                <div class="img-thumb">
                  <img src="assets/img/testimonial/img4.jpg" alt="">
                </div>
                <div class="info">
                  <h2><a href="#">Fernanda Anaya</a></h2>
                  <h3><a href="#">Housewife</a></h3>
                </div>
                <div class="content">
                  <p class="description">Praesent cursus nulla non arcu tempor, ut egestas elit tempus. In ac ex fermentum, gravida felis nec, tincidunt ligula.</p>
                  <div class="star-icon mt-3">
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-half"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial Section End -->

  <!-- Contact Section Start -->
  <section id="contact" class="section-padding bg-gray">
    <div class="container">
      <div class="section-header text-center">
        <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Contact Us</h2>
        <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
      </div>
      <?php
      // Add Data
      if (isset($_POST["submitBtn"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $sql = "INSERT INTO contact (contactName,contactEmail,contactSubject,contactMessage) VALUES ('$name','$email','$subject','$message')";
        $result = mysqli_query($db, $sql);

        if ($result) {
          echo '<div class="alert alert-success" role="alert">
Message is sent</div>';
        } else {
          echo '<div class="alert alert-danger" role="alert">
Message is not sent</div>';
        }
      } ?>
      <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.3s">
        <div class="col-lg-7 col-md-12 col-sm-12">
          <div class="contact-block">
            <form action="" method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" placeholder="Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" placeholder="Subject" id="msg_subject" class="form-control" name="subject" required data-error=" Please enter your subject">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message" name="message" rows="7" data-error="Write your message" required></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="submit-button text-left">
                    <button class="btn btn-common" id="form-submit" type="submit" name="submitBtn">Send Message</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-5 col-md-12 col-xs-12">
          <div class="map">
            <iframe width="550" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCwx_fIF6BS-yIhlmZWVDyubiZVQQQj3TU&q=Kuala%Lumpur">
            </iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section End -->

  <!-- Footer Section Start -->
  <?php include('./assets/includes/footer.php') ?>
  <!-- Footer Section End -->

  <!-- Go to Top Link -->
  <a href="#" class="back-to-top">
    <i class="lni-arrow-up"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader">
    <div class="loader" id="loader-1"></div>
  </div>
  <!-- End Preloader -->

  <?php include('./assets/includes/body.php'); ?>
  <script src="assets/js/jquery.easing.min.js"></script>
  <script src="assets/js/scrolling-nav.js"></script>

</body>

</html>