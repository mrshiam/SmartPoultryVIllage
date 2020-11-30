<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/top_bar.php'; ?>
<?php include_once 'includes/nav_bar.php' ?>
<div class="header text-center">
    <h1><u>Registration Form</u></h1>
</div>
<div class="container-fluid card form_container">
    <div class="row card-row">
        <div class="col-lg-6">
            <div class="image_card">
                <img src="images/farmers-working-chicken.jpg" alt="">
            </div>
        </div>
        <div class="col-lg-6 card_form">
            <?php

            if(isset($_GET['error'])) {
                $error = $_GET['error'];
                $errors = urldecode($error);
                $frm_errors = unserialize($errors);
                foreach ($frm_errors as $err)
                    if (empty($err)) {
                    } else { ?>
                        <p class='alert alert-danger'><i class="fa fa-exclamation-triangle" aria-hidden="true" style="margin-right: 5px;"></i><?php echo $err ?></p><br>

                    <?php  }
            }
            ?>
                <form class="reg_form" action="add_user.php" method="post">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Farm Name</label>
                                <input type="text" id="farm_name" name ="user[farm_name]" placeholder="Enter your farm name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">Full Name</label>
                                <input type="text" id="full_name" name ="user[full_name]" placeholder="Enter your full name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="street" class=" form-control-label">Email Address</label>
                                <input type="text" id="email_address" name ="user[email_address]" placeholder="Enter Email Address" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="city" class=" form-control-label">Phone Number</label>
                                <input type="text" id="phone_number" name ="user[phone_number]" placeholder="Enter your Phone Number" class="form-control">
                            </div>
                        </div>
                    </div>
                        <div class="row form-group">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="postal-code" class=" form-control-label">Password</label>
                                    <input type="password" id="password" name ="user[password]" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                    <div class="row form-group">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="country" class=" form-control-label"> Confirm Password</label>
                                <input type="password" id="confirm_password" name ="user[confirm_password]" placeholder="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Register</button>
                    </div>
                    <div class="form-group text-center">
                        <a href="login_form.php">I have already account</a>
                    </div>
                </div>
                </form>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>