<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_login(); ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('oexpances_repo.php'));
}
$id = $_GET['id'];
$oexpense = OtherExpenses::find_by_id($id);
if($oexpense == false) {
    redirect_to(url_for('oexpances_repo.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['oexpenses'];
    $oexpense->merge_attributes($args);
    $result = $oexpense->save();

    if($result === true) {
        $session->message('Other Expenses Updated successfully.');
        redirect_to(url_for('oexpances_repo.php'));

    } else {
        // show errors
    }

} else {

    // display the form

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
                            <div class="card-header"></div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Other Expenses</h3>
                                    <?php echo display_errors($oexpense->errors); ?>
                                </div>
                                <hr>
                                <?php
                                if(!isset($oexpense)) {
                                    redirect_to(url_for('oexpances_repo.php'));
                                }
                                ?>
                                <form action="oexpenses_repo_update.php?id=<?php echo $id?>" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="element_name" class="control-label mb-1">Name of the Expense Element</label>
                                        <input id="element_name" name="oexpenses[element_name]" type="text" class="form-control" value="<?php echo $oexpense->element_name ?>">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="buying_reason" class="control-label mb-1">Reason of Buying It</label>
                                        <input id="buying_reason" name="oexpenses[buying_reason]" type="text" class="form-control" value="<?php echo $oexpense->buying_reason ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="element_price" class="control-label mb-1">Amount of Money </label>
                                        <input id="element_price" name="oexpenses[element_price]" type="tel" class="form-control" value="<?php echo $oexpense->element_price ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="buying_date" class="control-label mb-1">Date</label>
                                                <input id="buying_date" name="oexpenses[buying_date]" type="date" class="form-control" value="<?php echo $oexpense->buying_date ?>" placeholder="MM / YY">
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Update Other Expenses</span>
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
