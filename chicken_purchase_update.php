<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('chicken_purchase_repo.php'));
}
$id = $_GET['id'];
$chicken = Chicken::find_by_id($id);
if($chicken == false) {
    redirect_to(url_for('chicken_purchase_repo.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['chicken'];
    $chicken->merge_attributes($args);
    $result = $chicken->save();

    if($result === true) {
        $_SESSION['message'] = 'The Chicken was updated successfully.';

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
                    <h3> Chicken Purchase Update</h3>
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
                                <h3 class="text-center title-2">Chicken Purches</h3>
                            </div>
                            <hr>
                            <?php
                            if(!isset($chicken)) {
                                redirect_to(url_for('chicken_purchase_repo.php'));
                            }
                            ?>
                            <form id = "cpurchase_form" action="chicken_purchase_update.php?id=<?php echo $id?>" method="post" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tc" class="control-label mb-1">Chicken Batch Name</label>
                                            <input id="c_batch" name="chicken[batch_name]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $chicken->batch_name ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tc" class="control-label mb-1">Number of Chicken</label>
                                            <input id="tchicken" name="chicken[chicken_number]" type="text" class="form-control" aria-required="true" aria-invalid="false" onblur="autoInput()"  value="<?php echo $chicken->chicken_number ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tc" class="control-label mb-1">Chicken Inventory</label>
                                            <input id="invent_chicken" name="chicken[chicken_inventory]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $chicken->chicken_inventory ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group has-success">
                                            <label for="m_amount" class="control-label mb-1">Amount of Money</label>
                                            <input id="tmoney" name="chicken[chicken_price]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                   autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $chicken->chicken_price ?>">
                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Price of Per Chicken</label>
                                    <input id="price_chicken" name="chicken[per_price]" type="tel" class="form-control cc-number identified visa" onclick="Calculate()" value="<?php echo $chicken->per_price ?>" data-val="true"

                                           data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                           autocomplete="cc-number">
                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-exp" class="control-label mb-1">Purchase Date</label>
                                            <input id="cc-exp" name="chicken[purchase_date]" type="date" class="form-control cc-exp" value="<?php echo $chicken->purchase_date ?>" data-val="true" data-val-required="Please enter the card expiration"
                                                   data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                   autocomplete="cc-exp">
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="x_card_code" class="control-label mb-1">Retailer Name</label>
                                        <div class="input-group">
                                            <input id="x_card_code" name="chicken[retailer_name]" type="tel" class="form-control cc-cvc" value="<?php echo $chicken->retailer_name ?>" data-val="true" data-val-required="Please enter the security code"
                                                   data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Update Purchase</span>
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
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/dashboard/footer.php' ?>
