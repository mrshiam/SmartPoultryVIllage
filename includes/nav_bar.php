 <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">

        <h1 class="text-light"><a href="index.php"><img src="assets/img/mylogo.png" alt="SmartPoltryVillagelogo"><span>Smart Poultry Village</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>

            <?php if($session->is_logged_in()) {
            $id = $session->user_id;
            ?>
                <li class=""><a href="index.php">Home</a></li>
                <li><a href="index.php#about">About Us</a></li>
                <li><a href="index.php#services">Services</a></li>
                <li><a href="index.php#contact">Contact Us</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="user_details.php?id=<?php echo $id ?>">Account</a></li>
                <li><a href="logout.php">Log Out</a></li>
            <?php }else{ ?>
            <li class=""><a href="index.php">Home</a></li>
            <li><a href="index.php#about">About Us</a></li>
            <li><a href="index.php#services">Services</a></li>
            <li><a href="login_form.php">Log In</a></li>
            <li><a href="reg_form.php">Register</a></li>
            <li><a href="index.php#contact">Contact Us</a></li>
           <?php } ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->