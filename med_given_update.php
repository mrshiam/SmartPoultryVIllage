<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('med_given_repo.php'));
}
$id = $_GET['id'];
$med_given = MedicineGiven::find_by_id($id);
if($med_given == false) {
    redirect_to(url_for('med_given_repo.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['med'];
    $med_given->merge_attributes($args);
    $result = $med_given->save();

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
                                    <h3 class="text-center title-2">Food Given Track</h3>
                                </div>
                                <hr>
                                <?php
                                if(!isset($med_given)) {
                                    redirect_to(url_for('med_given_repo.php'));
                                }
                                ?>
                                <form action="med_given_update.php?id=<?php echo $med_given->id ?>" method="post" novalidate="novalidate">
                                    <div class="form-group">

                                        <label for="select" class=" form-control-label">Name of The Food</label>
                                        <select name="med[gmed_name]" id="select" value = "<?php echo $med_given->gmed_name ?>" class="form-control">
                                            <?php
                                            $mymed = Medicine::find_all();
                                            foreach ($mymed as $med) {

                                                ?>
                                                <option value="<?php echo $med->med_name;?>"><?php echo $med->med_name;?></option>

                                            <?php } ?>
                                        </select>
                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1">Amount of Medicine Given</label>
                                            <input id="cc-name" name="med[med_given_amount]" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter Reason of Buying It"
                                                   autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $med_given->med_given_amount ?>">
                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cc-exp" class="control-label mb-1">Date</label>
                                                    <input id="cc-exp" name="med[med_given_date]" type="date" class="form-control cc-exp" value="<?php echo $med_given->med_given_date ?>" data-val="true" data-val-required="Please enter Date"
                                                           data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                           autocomplete="cc-exp">
                                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                                                <span id="payment-button-amount">Update Given Medicine</span>
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
