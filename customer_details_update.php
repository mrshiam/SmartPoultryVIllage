<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('customer_details_repo.php'));
}
$id = $_GET['id'];
$cust_detail = Customer::find_by_id($id);
if($cust_detail == false) {
    redirect_to(url_for('customer_details_repo.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['customer'];
    $cust_detail->merge_attributes($args);
    $result = $cust_detail->save();

    if($result === true) {
        $_SESSION['message'] = 'The Customer Details was updated successfully.';

    } else {
        // show errors
    }

} else {

    // display the form

}

?>
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
                                <?php
                                if(!isset($cust_detail)) {
                                    redirect_to(url_for('customer_details_repo.php'));
                                }
                                ?>
                                <form action="customer_details_update.php?id=<?php echo $cust_detail->id ?>" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                                        <input id="cc-pament" name="customer[customer_name]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $cust_detail->customer_name ?>">
                                    </div>
                                    <div class = 'row'>
                                        <div class = col-12 >
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Customer Address</label>
                                                <input id="cc-name" name="customer[customer_address]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                       autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $cust_detail->customer_address ?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Customer Phone</label>
                                        <input id="cc-number" name="customer[customer_phone]" type="tel" class="form-control cc-number identified visa" value="<?php echo $cust_detail->customer_phone ?>" data-val="true"
                                               data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                               autocomplete="cc-number">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Update Customer Details</span>
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
