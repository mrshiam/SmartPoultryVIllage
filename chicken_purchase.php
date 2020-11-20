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
                                            <h3 class="text-center title-2">Chicken Purches</h3>
                                        </div>
                                        <hr>
                                        <form id = "cpurchase_form" action="chicken_input.php" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="tc" class="control-label mb-1">Chicken Batch Name</label>
                                                        <input id="c_batch" name="chicken[batch_name]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="tc" class="control-label mb-1">Number of Chicken</label>
                                                        <input id="tchicken" name="chicken[chicken_number]" type="text" class="form-control" aria-required="true" aria-invalid="false" onblur="autoInput()"  value="">
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="tc" class="control-label mb-1">Chicken Inventory</label>
                                                            <input id="invent_chicken" name="chicken[chicken_inventory]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group has-success">
                                                            <label for="m_amount" class="control-label mb-1">Amount of Money</label>
                                                            <input id="tmoney" name="chicken[chicken_price]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="">
                                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Price of Per Chicken</label>
                                                <input id="price_chicken" name="chicken[per_price]" type="tel" class="form-control cc-number identified visa" onclick="Calculate()" value="" data-val="true"

                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Purchase Date</label>
                                                        <input id="purchase_date" name="chicken[purchase_date]" type="date" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Retailer Name</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="chicken[retailer_name]" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
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
                                                var chicken_number = document.getElementById("tchicken").value;
                                                document.getElementById("invent_chicken").value=chicken_number;
                                            }

                                            function Calculate()
                                            {
                                            var totalchick = document.getElementById('tchicken').value;
                                            var totalMoney = document.getElementById('tmoney').value;
                                            document.getElementById('price_chicken').value=parseInt(totalMoney) /       parseInt(totalchick);

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