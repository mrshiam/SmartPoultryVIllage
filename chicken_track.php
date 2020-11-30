<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_login(); ?>
<div class="page-container">
            <!-- HEADER DESKTOP-->
    <?php if($session->is_logged_in()) {
        $id = $session->user_id
        ?>
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <?php $user = User::find_by_id($id)?>
                        <h4>
                            <i class="fa fa-university" aria-hidden="true" style="margin-right: 5px;"></i>Farm Name:   <?php echo $user->farm_name ?>
                        </h4>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $user->full_name ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info">
                                        <h5 class="name">
                                            <a href="#"><?php echo $user->full_name ?></a>
                                        </h5>
                                        <span class="email"><?php echo $user->email_address ?></span>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="user_details.php?id=<?php echo $id ?>">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="logout.php">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <?php } ?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Chicken Mortality Track</h3>
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
                                        </div>
                                        <hr>
                                        <form action="chicken_mortality.php" method="post" novalidate="novalidate">
                                            <div class = "row">
                                                <div class = "col-6">
                                                    <div class="form-group">
                                                        <label for="chicken_number" class="control-label mb-1">Number of Chicken</label>
                                                        <input id="chicken_number" name="chicken[chicken_number]" type="text" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class = "col-6">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Chicken Batch Name</label>
                                                        <select name="chicken[batch_name]" id="ck_batch" class="form-control">
                                                            <option value="" selected="selected">Please select</option>
                                                            <?php
                                                            $chickens = Chicken::find_all();
                                                            foreach ($chickens as $chicken) {

                                                                ?>
                                                                <option value="<?php echo $chicken->batch_name;?>"><?php echo $chicken->batch_name; ?></option>

                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="reason_of_die" class="control-label mb-1">Reason of Die Or Diesease Name</label>
                                                <input id="reason_of_die" name="chicken[reason_of_die]" type="text" class="form-control" value="">
                                            </div>
                                           
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="date" class="control-label mb-1">Date</label>
                                                        <input id="date" name="chicken[date]" type="date" class="form-control" value="" placeholder="MM / YY">
                                                    </div>
                                                </div>

                                            </div>
                                            <div>
                                                <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Submit</span>

                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>
            </div>
<?php include_once 'includes/dashboard/footer.php' ?>