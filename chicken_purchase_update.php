<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_login(); ?>


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
        $session->message('Chicken Purchase Updated successfully.');
        redirect_to(url_for('chicken_purchase_repo.php'));

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
                                <h3 class="text-center title-2">Chicken Purchase</h3>
                                <?php echo display_errors($chicken->errors); ?>
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
                                            <label for="c_batch" class="control-label mb-1">Chicken Batch Name</label>
                                            <input id="c_batch" name="chicken[batch_name]" type="text" class="form-control" value="<?php echo $chicken->batch_name ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tchicken" class="control-label mb-1">Number of Chicken</label>
                                            <input id="tchicken" name="chicken[chicken_number]" type="text" class="form-control" onblur="autoInput()"  value="<?php echo $chicken->chicken_number ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="invent_chicken" class="control-label mb-1">Chicken Inventory</label>
                                            <input id="invent_chicken" name="chicken[chicken_inventory]" type="text" class="form-control" value="<?php echo $chicken->chicken_inventory ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group has-success">
                                            <label for="m_amount" class="control-label mb-1">Amount of Money</label>
                                            <input id="tmoney" name="chicken[chicken_price]" type="text" class="form-control"  value="<?php echo $chicken->chicken_price ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price_chicken" class="control-label mb-1">Price of Per Chicken</label>
                                    <input id="price_chicken" name="chicken[per_price]" type="text" class="form-control" onclick="Calculate()" value="<?php echo $chicken->per_price ?>">
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-exp" class="control-label mb-1">Purchase Date</label>
                                            <input id="cc-exp" name="chicken[purchase_date]" type="date" class="form-control" value="<?php echo $chicken->purchase_date ?>" placeholder="MM / YY">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="x_card_code" class="control-label mb-1">Retailer Name</label>
                                        <div class="input-group">
                                            <input id="x_card_code" name="chicken[retailer_name]" type="tel" class="form-control cc-cvc" value="<?php echo $chicken->retailer_name ?>">

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Update Purchase</span>
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
