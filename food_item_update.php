<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_login(); ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('food_item.php'));
}
$id = $_GET['id'];
$food = Food::find_by_id($id);
if($food == false) {
    redirect_to(url_for('food_item.php'));
}

if(is_post_request()) {

    $args = $_POST['food'];
    $food->merge_attributes($args);
    $result = $food->save();

    if($result === true) {
        $session->message('Food Item Updated successfully.');
        redirect_to(url_for('food_item.php'));

    } else {
        // show errors
    }

} else {


}

?>
<div class="page-container">
    <!-- HEADER DESKTOP-->
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
                            <div class="card-header">Add Item</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Food Item</h3>
                                    <?php echo display_errors($food->errors); ?>
                                </div>
                                <hr>
                                <?php
                                if(!isset($food)) {
                                    redirect_to(url_for('food_item.php'));
                                }
                                ?>
                                <form action="food_item_update.php?id=<?php echo $id?>" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Food Label Name</label>
                                        <input id="cc-pament" name="food[food_name]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $food->food_name ?>">
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Food Unit Price</label>
                                                <input id="cc-pament" name="food[food_unit_price]" type="text" class="form-control" placeholder="kg" aria-required="true" aria-invalid="false" value="<?php echo $food->food_unit_price ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Adding Date</label>
                                                <input id="cc-exp" name="food[adding_date]" type="date" class="form-control cc-exp" value="<?php echo $food->adding_date ?>" data-val="true" data-val-required="Please enter the card expiration"
                                                       data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                       autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Update Food Item</span>
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
