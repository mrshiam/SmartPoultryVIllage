<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>

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
                                    <div class="card-header">Purches</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Food Purches</h3>
                                        </div>
                                        <hr>
                                        <form action="food_purchase_input.php" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Food Label Name</label>

                                                <select name="food[food_name]" id="ck_batch" class="form-control">
                                                    <?php
                                                    $foods = Food::find_all();
                                                    foreach ($foods as $food) {

                                                        ?>
                                                        <option value="<?php echo $food->food_name;?>"><?php echo $food->food_name; ?></option>


                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="row">
                                                 <div class="col-12">
                                                    <div class="form-group has-success">
                                                        <label for="food_amount" class="control-label mb-1">Amount of Food</label>
                                                        <input id="cc-pament" name="food[food_id]" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $food->food_id?>">
                                                        <input id="food_amount" name="food[food_amount]" type="text" class="form-control cc-name valid" data-val="true" placeholder="kg" data-val-required="Please enter the name on card"
                                                            autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" onblur="autoInput()" value="">
                                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                    </div>
                                                    </div>

                                                 </div>

                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Price of Food</label>
                                                <input id="cc-number" name="food[food_price]" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Purchase Date</label>
                                                        <input id="cc-exp" name="food[purchase_date]" type="date" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Retailer Name</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="food[retailer_name]" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Submiting....</span>
                                                </button>
                                            </div>
                                        </form>
                                        <script>
                                            function autoInput() {
                                                var food_number = document.getElementById("food_amount").value;
                                                document.getElementById("food_invent").value=food_number;
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