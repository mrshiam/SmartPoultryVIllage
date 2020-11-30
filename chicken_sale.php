<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>
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
                                            <h3 class="text-center title-2">Chicken Sale</h3>
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
                                        <form action="chicken_sale_input.php" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="ck_batch" class="control-label mb-1">Chicken Batch Name</label>
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
                                            <div class = "row">
                                                <div class = "col-6">
                                                    <div class="form-group">
                                                        <label for="tc" class="control-label mb-1">Number of Chicken</label>
                                                        <input id="tc" name="chicken[schicken_number]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                                    </div>
                                                </div>
                                                <div class = "col-6">
                                                    <div class="form-group has-success">
                                                        <label for="pg_chickenPrice" class="control-label mb-1">Per KG Chicken Price</label>
                                                        <input id="pg_chickenPrice" name="chicken[per_kg_price]" type="text" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-6">
                                                    <div class="form-group">
                                                        <label for="tw_chicken" class="control-label mb-1">Total Weight of Chickens</label>
                                                        <input id="tw_chicken" name="chicken[tchicken_weight]" type="text" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class = "col-6">
                                                    <div class="form-group has-success">
                                                        <label for="m_amount" class="control-label mb-1">Total Amount of Money</label>
                                                        <input id="m_amount" name="chicken[tamount_money]" type="text"  class="form-control" onclick="Calculate()" value="" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="sale_date" class="control-label mb-1">Sales Date</label>
                                                        <input id="sale_date" name="chicken[sale_date]" type="date" class="form-control" value="" placeholder="MM / YY">

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="customer_name" class="control-label mb-1">Customer Name</label>
                                                    <select name="chicken[customer_name]" id="select" class="form-control">
                                                        <option value="" selected="selected">Please select</option>
                                                        <?php
                                                        $customers = Customer::find_all();
                                                        foreach ($customers as $customer) {

                                                            ?>
                                                            <option value="<?php echo $customer->customer_name;?>"><?php  echo $customer->customer_name;?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Submit</span>
                                                </button>
                                            </div>
                                        </form>
                                        <script>
                                            function Calculate()
                                            {
                                                var chicken_price = document.getElementById('pg_chickenPrice').value;
                                                var chicken_weight = document.getElementById('tw_chicken').value;
                                                document.getElementById('m_amount').value=parseInt(chicken_price) *      parseInt(chicken_weight);

                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>
            </div>
    <script type="text/javascript">
        function PerChickenPrice() {
            var tchicken = document.getElementById("tc").value;
            var tamount = document.getElementById("m_amount").value;
            var pcp = tamount / tchicken;

        }
    </script>
<?php include_once 'includes/dashboard/footer.php' ?>