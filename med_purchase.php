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
                                    <div class="card-header">Purchase</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Medicine Purches</h3>
                                        </div>
                                        <hr>
                                        <form action="med_purchase_input.php" id="medForm" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Medicine Name</label>
                                                        <select name="med[med_id]" id="med_id" onchange="showUser(this.value)" class="form-control">
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
                                                    <?php
                                                    if(isset($_GET['u'])) {
                                                    $u = intval($_GET['u']);
                                                    $sql = "SELECT med_unit FROM med_item WHERE id='$u'";
                                                    $med_units = Database::$database->query($sql);
                                                    foreach ($med_units as $med_unit=>$value){ ?>

                                                    <label for="select" class=" form-control-label">Type Unit</label>
                                                    <input id="med_unit" name="med[med_unit]"  class="form-control cc-number identified visa"  value="<?php echo $value['med_unit']?>" readonly>
                                                        <?php } ?>
                                                       <?php }else{ ?>
                                                        <label for="select" class=" form-control-label">Type Unit</label>
                                                        <input id="med_unit" name="med[med_unit]"  class="form-control cc-number identified visa"  value="" readonly>
                                                   <?php } ?>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Amount of Medicine</label>
                                                <input id="med_amount" name="med[med_amount]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter Amount of Med"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Price of Medicine</label>
                                                        <input id="med_price" name="med[med_price]" type="text" class="form-control cc-number identified visa" value="" data-val="true"
                                                            data-val-required="Please enter the card number" data-val-cc-number="Please enter Price of Medicine"
                                                            autocomplete="cc-number">
                                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Medicine Unit Price</label>
                                                        <input id="med_unit_price" name="med[med_unit_price]" type="text" class="form-control cc-number identified visa" onclick="Calculate()" value="" data-val="true"
                                                               data-val-required="Please enter the card number" data-val-cc-number="Please enter Price of Medicine"
                                                               autocomplete="cc-number">
                                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Purchase Date</label>
                                                        <input id="cc-exp" name="med[med_pdate]" type="date" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter Purchase Date"
                                                            data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Retailer Name</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="med[med_rname]" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
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
                                            function Calculate()
                                            {
                                                var medAmount = document.getElementById('med_amount').value;
                                                var medPrice = document.getElementById('med_price').value;
                                                document.getElementById('med_unit_price').value=parseInt(medPrice) /      parseInt(medAmount);

                                            }
                                            function showUser(str) {
                                                if (str === "") {
                                                    document.getElementById("med_unit").innerHTML = "";
                                                    return;
                                                } else {
                                                    var xmlhttp = new XMLHttpRequest();
                                                    xmlhttp.onreadystatechange = function() {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            document.getElementById("med_unit").innerHTML = this.responseText;
                                                        }
                                                    };
                                                    xmlhttp.open("GET","med_purchase.php?u="+str,true);
                                                    xmlhttp.send();
                                                }
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