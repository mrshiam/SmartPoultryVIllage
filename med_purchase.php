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
                                            <h3 class="text-center title-2">Medicine Purchase</h3>
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
                                        <form action="med_purchase_input.php" id="medForm" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Medicine Name</label>
                                                        <select name="med[med_id]" id="med_id" onchange="showUser(this.value)" class="form-control">
                                                            <option value="" selected="selected">Please select</option>
                                                            <?php
                                                            $meds = Medicine::find_all();
                                                            foreach ($meds as $med) {

                                                                ?>
                                                                <option value="<?php echo $med->id;?>"><?php echo $med->med_name; ?></option>


                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <div class = col-6 >
                                                <div class="form-group">
                                                    <label for="select" class=" form-control-label">Type Unit</label>
                                                    <select id="med_unit" name="med[med_unit]"  class="form-control"  >
                                                        <option value="" selected="selected">Please select</option>
                                                            <option value="kg">kg</option>
                                                            <option value="lit">lit</option>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="med_amount" class="control-label mb-1">Amount of Medicine</label>
                                                <input id="med_amount" name="med[med_amount]" type="text" class="form-control" value="">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="med_price" class="control-label mb-1">Price of Medicine</label>
                                                        <input id="med_price" name="med[med_price]" type="text" class="form-control" value="" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="med_unit_price" class="control-label mb-1">Medicine Unit Price</label>
                                                        <input id="med_unit_price" name="med[med_unit_price]" type="text" class="form-control" onclick="Calculate()" value="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="med_pdate" class="control-label mb-1">Purchase Date</label>
                                                        <input id="med_pdate" name="med[med_pdate]" type="date" class="form-control" value="" placeholder="MM / YY">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="med_rname" class="control-label mb-1">Retailer Name</label>
                                                    <div class="input-group">
                                                        <input id="med_rname" name="med[med_rname]" type="text" class="form-control" value="" >

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
                                            function Calculate()
                                            {
                                                var medAmount = document.getElementById('med_amount').value;
                                                var medPrice = document.getElementById('med_price').value;
                                                document.getElementById('med_unit_price').value=parseInt(medPrice) /      parseInt(medAmount);

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
</div>
<?php include_once 'includes/dashboard/footer.php' ?>