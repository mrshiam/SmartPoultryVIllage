<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('med_purchase_repo.php'));
}
$id = $_GET['id'];
$med = MedicinePurchase::find_by_id($id);
if($med == false) {
    redirect_to(url_for('med_purchase_repo.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['med'];
    $med->merge_attributes($args);
    $result = $med->save();

    if($result === true) {
        $_SESSION['message'] = 'The Medicine was updated successfully.';

    } else {
        // show errors
    }

} else {

    // display the form

}

?>

<div class="page-container">
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <h3> Medicine Purchase Update</h3>
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
                            <?php
                            if(!isset($med)) {
                                redirect_to(url_for('med_purchase_repo.php'));
                            }
                            ?>
                            <form action="med_purchase_input.php" id="medForm" method="post" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Medicine Name</label>
                                            <select name="med[med_id]" id="med_id" class="form-control">
                                                <?php
                                                $mednames = Medicine::find_all();
                                                foreach ($mednames as $medname) {

                                                    ?>
                                                    <option value="<?php echo $medname->id;?>"><?php echo $medname->med_name; ?></option>


                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = col-6 >
                                        <div class="form-group">

                                            <label for="select" class=" form-control-label">Type Unit</label>
                                            <input id="med_unit" name="med[med_unit]"  class="form-control cc-number identified visa"  value="<?php echo $med->med_unit ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Amount of Medicine</label>
                                    <input id="med_amount" name="med[med_amount]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter Amount of Med"
                                           autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $med->med_amount ?>">
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Price of Medicine</label>
                                            <input id="med_price" name="med[med_price]" type="text" class="form-control cc-number identified visa" value="<?php echo $med->med_price ?>" data-val="true"
                                                   data-val-required="Please enter the card number" data-val-cc-number="Please enter Price of Medicine"
                                                   autocomplete="cc-number">
                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Medicine Unit Price</label>
                                            <input id="med_unit_price" name="med[med_unit_price]" type="text" class="form-control cc-number identified visa" onclick="Calculate()" value="<?php echo $med->med_unit_price ?>" data-val="true"
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
                                            <input id="cc-exp" name="med[med_pdate]" type="date" class="form-control cc-exp" value="<?php echo $med->med_pdate ?>" data-val="true" data-val-required="Please enter Purchase Date"
                                                   data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                   autocomplete="cc-exp">
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="x_card_code" class="control-label mb-1">Retailer Name</label>
                                        <div class="input-group">
                                            <input id="x_card_code" name="med[med_rname]" type="text" class="form-control cc-cvc" value="<?php echo $med->med_rname ?>" data-val="true" data-val-required="Please enter the security code"
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
