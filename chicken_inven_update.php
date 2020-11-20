<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('chicken_inven_repo.php'));
}
$id = $_GET['id'];
$chicken_inven = ChickenMortality::find_by_id($id);
if($chicken_inven == false) {
    redirect_to(url_for('chicken_inven_repo.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['chicken'];
    $chicken_inven->merge_attributes($args);
    $result = $chicken_inven->save();

    if($result === true) {
        $_SESSION['message'] = 'The Chicken Mortality was updated successfully.';

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
                                    <h3 class="text-center title-2">Chicken Mortality Track</h3>
                                </div>
                                <hr>
                                <?php
                                if(!isset($chicken_inven)) {
                                    redirect_to(url_for('chicken_inven_repo.php'));
                                }
                                ?>
                                <form action="chicken_inven_update.php?id=<?php echo $id?>" method="post" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Number of Chicken</label>
                                                <input id="cc-pament" name="chicken[chicken_number]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $chicken_inven->chicken_number ?>">
                                            </div>
                                        </div>
                                        <div class = "col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Chicken Batch Name</label>
                                                <select name="chicken[batch_name]" id="ck_batch" class="form-control">
                                                    <?php
                                                    $chickens = Chicken::find_all();
                                                    foreach ($chickens as $chicken) {
                                                        ?>
                                                        <option value="<?php echo $chicken->batch_name;?> <?php if($chicken->batch_name==$chicken_inven->batch_name) echo 'selected="selected"'?>"><?php echo $chicken->batch_name; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Reason of Die Or Diesease Name</label>
                                        <input id="cc-name" name="chicken[reason_of_die]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter Reason of Buying It"
                                               autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $chicken_inven->reason_of_die ?>">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Date</label>
                                                <input id="cc-exp" name="chicken[date]" type="date" class="form-control cc-exp" value="<?php echo $chicken_inven->date ?>" data-val="true" data-val-required="Please enter Date"
                                                       data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                       autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                                            <span id="payment-button-amount">Update Mortality</span>
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
