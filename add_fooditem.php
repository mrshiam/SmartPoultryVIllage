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
                                <div class="card-header">Add Item</div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Add Food Item</h3>
                                    </div>
                                    <hr>
                                    <form action="food_input.php" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Food Label Name</label>
                                            <input id="cc-pament" name="food[food_name]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Adding Date</label>
                                                    <input id="cc-exp" name="food[adding_date]" type="date" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                           data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                           autocomplete="cc-exp">
                                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
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