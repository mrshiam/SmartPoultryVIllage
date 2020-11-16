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
                                    <div class="card-header text-center">Sale</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Chicken Sale</h3>
                                        </div>
                                        <hr>
                                        <form action="chicken_sale_input.php" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="ck_batch" class="control-label mb-1">Chicken Batch Name</label>
                                                <select name="chicken[batch_name]" id="ck_batch" class="form-control">
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
                                                        <input id="pg_chickenPrice" name="chicken[per_kg_price]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                            autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="">
                                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-6">
                                                    <div class="form-group">
                                                        <label for="tw_chicken" class="control-label mb-1">Total Weight of Chickens</label>
                                                        <input id="tw_chicken" name="chicken[tchicken_weight]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                                    </div>
                                                </div>
                                                <div class = "col-6">
                                                    <div class="form-group has-success">
                                                        <label for="m_amount" class="control-label mb-1">Total Amount of Money</label>
                                                        <input id="m_amount" name="chicken[tamount_money]" type="text"  class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                               autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" onclick="Calculate()" value="" readonly>
                                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Sales Date</label>
                                                        <input id="cc-exp" name="chicken[sale_date]" type="date" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Customer Name</label>
                                                    <select name="chicken[customer_name]" id="select" class="form-control">
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
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Submiting....</span>
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