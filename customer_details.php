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
                                        <h3 class="text-center title-2">Add Customer</h3>
                                    </div>
                                    <hr>
                                    <form action="add_customer.php" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                                            <input id="cc-pament" name="customer[customer_name]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div class = 'row'>
                                            <div class = col-6 >
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Customer Address</label>
                                                    <input id="cc-name" name="customer[customer_address]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                           autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="">
                                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                        <div class = col-6 >
                                            <div class="form-group">

                                                <label for="select" class=" form-control-label">Select Customer Type</label>
                                                <select name="customer[customer_type]" id="select"  class="form-control">
                                                    <option value="">Please select</option>
                                                    <option value="1">Egg Customer</option>
                                                    <option value="2">Chicken Customer</option>

                                                </select>

                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Customer Phone</label>
                                            <input id="cc-number" name="customer[customer_phone]" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                                   data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                   autocomplete="cc-number">
                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
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