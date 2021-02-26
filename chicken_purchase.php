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
                                            <h3 class="text-center title-2">Chicken Purchase</h3>
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
                                        <form id = "cpurchase_form" action="chicken_input.php" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <?php
                                                        $sql = "SELECT batch_name FROM `chicken_purchase` ORDER BY batch_name DESC LIMIT 1";
                                                        $chickens = Chicken::find_by_sql($sql);
                                                        foreach ($chickens as $chicken) {
                                                            ?>
                                                        <label for="c_batch" class="control-label mb-1">Chicken Batch Name(LBN: <?php echo $chicken->batch_name; ?>)</label><br>
                                                            <?php } ?>
                                                        <input id="c_batch" name="chicken[batch_name]" type="text" class="form-control"  value="">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="tchicken" class="control-label mb-1">Number of Chicken</label>
                                                        <input id="tchicken" name="chicken[chicken_number]" type="text" class="form-control"  onblur="autoInput()"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="invent_chicken" class="control-label mb-1">Chicken Inventory</label>
                                                            <input id="invent_chicken" name="chicken[chicken_inventory]" type="text" class="form-control"  value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="price_chicken" class="control-label mb-1">Price of Per Chicken</label>
                                                            <input id="price_chicken" name="chicken[per_price]" type="tel" class="form-control"  value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="form-group has-success">
                                                <label for="m_amount" class="control-label mb-1">Amount of Money</label>
                                                <input id="tmoney" name="chicken[chicken_price]" type="text" class="form-control" onclick="Calculate()" value="">
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="purchase_date" class="control-label mb-1">Purchase Date</label>
                                                        <input id="purchase_date" name="chicken[purchase_date]" type="date" class="form-control " value="" placeholder="MM / YY">

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="retailer_name" class="control-label mb-1">Retailer Name</label>
                                                    <div class="input-group">
                                                        <input id="retailer_name" name="chicken[retailer_name]" type="tel" class="form-control" value="">
                                                    </div>
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
                                            function autoInput() {
                                                var chicken_number = document.getElementById("tchicken").value;
                                                document.getElementById("invent_chicken").value=chicken_number;
                                            }

                                            function Calculate()
                                            {
                                            var totalchick = document.getElementById('tchicken').value;
                                            var perChicken = document.getElementById('price_chicken').value;
                                            document.getElementById('tmoney').value=parseInt(totalchick) *       parseInt(perChicken);

                                            }

                                            $(document).ready(function () {
                                                var currentDate = new Date();
                                                $('.disableFuturedate').datepicker({
                                                    format: 'dd/mm/yyyy',
                                                    autoclose:true,
                                                    endDate: "currentDate",
                                                    maxDate: currentDate
                                                }).on('changeDate', function (ev) {
                                                    $(this).datepicker('hide');
                                                });
                                                $('.disableFuturedate').keyup(function () {
                                                    if (this.value.match(/[^0-9]/g)) {
                                                        this.value = this.value.replace(/[^0-9^-]/g, '');
                                                    }
                                                });
                                            });
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