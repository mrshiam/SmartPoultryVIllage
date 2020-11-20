<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('transportation_cost_report.php'));
}
$id = $_GET['id'];
$transport = Transportation::find_by_id($id);
if($transport == false) {
    redirect_to(url_for('transportation_cost_report.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['transport'];
    $transport->merge_attributes($args);
    $result = $transport->save();

    if($result === true) {
        $_SESSION['message'] = 'The Transportation Info was updated successfully.';

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
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Transportation Expense</h3>
                                    </div>
                                    <?php
                                    if(!isset($transport)) {
                                        redirect_to(url_for('transportation_cost_report.php'));
                                    }
                                    ?>
                                    <hr>
                                    <form action="transport_cost_update.php?id=<?php echo $id?>" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Transport Name</label>
                                            <input id="cc-pament" name="transport[transport_name]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $transport->transport_name ?>">
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1">Reason of Using Transport</label>
                                            <select name="transport[batch_name]" id="ck_batch" class="form-control">
                                                <?php
                                                $chickens = Chicken::find_all();
                                                foreach ($chickens as $chicken) {
                                                    ?>
                                                    <option value="<?php echo $chicken->batch_name;?>" <?php if($chicken->batch_name==$transport->batch_name) echo 'selected="selected"' ?>><?php echo $chicken->batch_name; ?></option>

                                                <?php } ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Transportation Coast</label>
                                            <input id="cc-number" name="transport[transport_cost]" type="tel" class="form-control cc-number identified visa" value="<?php echo $transport->transport_cost ?>" data-val="true"
                                                   data-val-required="Please enter Transportation Coast" data-val-cc-number="Transportation Coast"
                                                   autocomplete="cc-number">
                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Date</label>
                                                    <input id="cc-exp" name="transport[used_date]" type="date" class="form-control cc-exp" value="<?php echo $transport->used_date ?>" data-val="true" data-val-required="Please enter Date"
                                                           data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                           autocomplete="cc-exp">
                                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Update Transport Info</span>
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