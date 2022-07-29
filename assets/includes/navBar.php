<nav class="navbar navbar-expand-md bg-inverse <?php echo ($page == 'index') ? "fixed-top" : ""; ?> scrolling-navbar">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display --> 
        <a class="navbar-brand" href="index.php">
        <img src="assets/img/foodLogo.png" alt="">
        </a>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="lni-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
            <li class="nav-item mx-2">
            <a class="nav-link" href="<?php echo ($page == 'index') ? "#hero-area" : "index.php#hero-area"; ?>">
                Home
            </a>
            </li>
            <li class="nav-item mx-2">
            <a class="nav-link" href="<?php echo ($page == 'index') ? "#about" : "index.php#about"; ?>">
                About Us
            </a>
            </li>
            <li class="nav-item mx-2">
            <a class="nav-link" href="<?php echo ($page == 'index') ? "#how" : "index.php#how"; ?>">
                How It Works
            </a>
            </li>
            <li class="nav-item mx-2">
            <a class="nav-link" href="<?php echo ($page == 'index') ? "#testimonial" : "index.php#testimonial"; ?>">
                Testimonial
            </a>
            </li>
            <li class="nav-item mx-2">
            <a class="nav-link" href="<?php echo ($page == 'index') ? "#contact" : "index.php#contact"; ?>">
                Contact
            </a>
            </li>
            <li class="nav-item mx-2">
            <a class="btn btn-nav" href="feature.php">
                Get Started
            </a>
            </li>
        </ul>
        </div>
    </div>
    </nav>