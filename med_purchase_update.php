<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_login(); ?>


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
        $session->message('Medicine Purchase Details Updated successfully.');
        redirect_to(url_for('med_purchase_repo.php'));

    } else {
        // show errors
    }

} else {

    // display the form

}

?>

<div class="page-container">
    <?php if($session->is_logged_in()) {
        $id = $session->user_id
        ?>
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <?php $user = User::find_by_id($id)?>
                        <h4>
                            <i class="fa fa-university" aria-hidden="true" style="margin-right: 5px;"></i>Farm Name:   <?php echo $user->farm_name ?>
                        </h4>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $user->full_name ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info">
                                        <h5 class="name">
                                            <a href="#"><?php echo $user->full_name ?></a>
                                        </h5>
                                        <span class="email"><?php echo $user->email_address ?></span>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="user_details.php?id=<?php echo $id ?>">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="logout.php">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <?php } ?>

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
                                <h3 class="text-center title-2">Medicine Purchase Update</h3>
                                <?php echo display_errors($med->errors); ?>
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
                                                    <option value="<?php echo $medname->id;?> <?php if($medname->id == $med->med_id) echo 'selected="selected"' ?>"><?php echo $medname->med_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = col-6 >
                                        <div class="form-group">
                                            <label for="select" class=" form-control-label">Type Unit</label>
                                            <select id="med_unit" name="med[med_unit]"  class="form-control"  >
                                                <option value="" selected="selected">Please select</option>
                                                <option value="<?php echo $med->med_unit ?>" if(med_unit.value ==<?php echo $med->med_unit ?>) <?php echo 'selected="selected"'?>><?php echo $med->med_unit ?></option>
                                                <option value="kg">kg</option>
                                                <option value="lit">lit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-success">
                                    <label for="med_amount" class="control-label mb-1">Amount of Medicine</label>
                                    <input id="med_amount" name="med[med_amount]" type="text" class="form-control" value="<?php echo $med->med_amount ?>">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="med_price" class="control-label mb-1">Price of Medicine</label>
                                            <input id="med_price" name="med[med_price]" type="text" class="form-control" value="<?php echo $med->med_price ?>" >
                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="med_unit_price" class="control-label mb-1">Medicine Unit Price</label>
                                            <input id="med_unit_price" name="med[med_unit_price]" type="text" class="form-control" onclick="Calculate()" value="<?php echo $med->med_unit_price ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="med_pdate" class="control-label mb-1">Purchase Date</label>
                                            <input id="med_pdate" name="med[med_pdate]" type="date" class="form-control" value="<?php echo $med->med_pdate ?>" placeholder="MM / YY">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="x_card_code" class="control-label mb-1">Retailer Name</label>
                                        <div class="input-group">
                                            <input id="med_rname" name="med[med_rname]" type="text" class="form-control" value="<?php echo $med->med_rname ?>" >

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Submit</span>
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
