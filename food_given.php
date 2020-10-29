
<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_once('includes/init.php'); ?>
<div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                          
                        </div>
                    </div>
                </div>
            </header>
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
                                            <h3 class="text-center title-2">Food Given Track</h3>
                                        </div>
                                        <hr>

                                        <form action="given_food.php" method="post" novalidate="novalidate">
                                            <div class="form-group">

                                                <label for="select" class=" form-control-label">Name of The Food</label>
                                                <select name="gfood[gfood_name]" id="select" class="form-control">
                                                    <?php
                                                    $foods = Food::find_all();
                                                    foreach ($foods as $food) {

                                                        ?>
                                                        <option value="<?php echo $food->food_name;?>"><?php echo $food->food_name; ?></option>


                                                    <?php } ?>
                                                </select>

                                            </div>
                                            <div class="row">
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Amount of Food Given</label>
                                                <?php
                                                    $foods = Food::find_all();
                                                    foreach ($foods as $food) {

                                                        ?>
                                                <input id="cc-pament" name="gfood[food_id]" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $food->food_id?>">
                                                <?php } ?>
                                                <input id="cc-name" name="gfood[gfood_amount]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter Reason of Buying It"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            </div>
                                                <div class = "col-6">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Chicken Batch Name</label>
                                                        <select name="gfood[batch_name]" id="ck_batch" class="form-control">
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
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Date</label>
                                                        <input id="cc-exp" name="gfood[given_date]" type="date" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter Date"
                                                            data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Submiting....</span>
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