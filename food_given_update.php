<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>
<?php require_login(); ?>


<?php
require_once('includes/init.php');


if(!isset($_GET['id'])) {
    redirect_to(url_for('food_given_repo.php'));
}
$id = $_GET['id'];
$food_given = FoodGiven::find_by_id($id);
if($food_given == false) {
    redirect_to(url_for('food_given_repo.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['gfood'];
    $food_given->merge_attributes($args);
    $result = $food_given->save();

    if($result === true) {
        $session->message('Food Given Data Updated successfully.');
        redirect_to(url_for('food_given_repo.php'));

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
                                    <h3 class="text-center title-2">Food Given Update</h3>
                                    <?php echo display_errors($food_given->errors); ?>
                                </div>
                                <hr>
                                <?php
                                if(!isset($food_given)) {
                                    redirect_to(url_for('food_given_repo.php'));
                                }
                                ?>
                                <form action="food_given_update.php?id=<?php echo $id?>" method="post" novalidate="novalidate">
                                    <div class="form-group">

                                        <label for="select" class=" form-control-label">Name of The Food</label>
                                        <select name="gfood[food_id]" id="select"  class="form-control">
                                            <?php
                                            $myfood = Food::find_all();
                                            foreach ($myfood as $food) {

                                                ?>
                                                <option value="<?php echo $food->id;?>" <?php if($food->id == $food_given->id) echo 'selected = "selected"' ?>><?php echo $food->food_name;?></option>

                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group has-success">
                                                <label for="gfood_amount" class="control-label mb-1">Amount of Food Given</label>
                                                <input id="gfood_amount" name="gfood[gfood_amount]" type="text" class="form-control" value="<?php echo $food_given->gfood_amount ?>">
                                            </div>
                                        </div>
                                        <div class = "col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Chicken Batch Name</label>
                                                <select name="gfood[batch_name]" id="ck_batch" class="form-control">
                                                    <?php
                                                    $chickens = Chicken::find_all();
                                                    foreach ($chickens as $chicken) {

                                                        ?>
                                                        <option value="<?php echo $chicken->batch_name;?>" <?php if($chicken->batch_name==$food_given->batch_name) echo 'selected="selected"' ?>><?php echo $chicken->batch_name; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="given_date" class="control-label mb-1">Date</label>
                                                <input id="given_date" name="gfood[given_date]" type="date" class="form-control" value="<?php echo $food_given->given_date ?>" placeholder="MM / YY">
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Update Food Given</span>
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
