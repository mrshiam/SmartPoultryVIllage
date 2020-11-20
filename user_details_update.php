<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/top_bar.php'; ?>
<?php include_once 'includes/nav_bar.php' ?>
<?php
require_once('includes/init.php');
if(!isset($_GET['id'])) {
    redirect_to(url_for('user_details.php'));
}
$id = $_GET['id'];
$user = User::find_by_id($id);
if($user == false) {
    redirect_to(url_for('user_details.php'));
}

if(is_post_request()) {

    // Save record using post parameters
    $args = $_POST['user'];
    $user->merge_attributes($args);
    $result = $user->save();

    if($result === true) {


    } else {
        // show errors
    }

} else {

    // display the form

}
?>
    <div class="header text-center">
        <h1><u>Update User Details</u></h1>
    </div>
    <div class="container-fluid card form_container">
        <div class="row card-row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 card_form">
                <?php
                if(!isset($user)) {
                    redirect_to(url_for('user_details.php'));
                }
                ?>
                <form class="reg_form" action="user_details_update.php?id=<?php echo $id ?>" method="post">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Farm Name</label>
                                    <input type="text" id="farm_name" name ="user[farm_name]" value="<?php echo $user->farm_name ?>" placeholder="Enter your farm name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Full Name</label>
                                    <input type="text" id="full_name" name ="user[full_name]" value="<?php echo $user->full_name ?>" placeholder="Enter your full name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">Email Address</label>
                                    <input type="text" id="email_address" name ="user[email_address]" value="<?php echo $user->email_address ?>" placeholder="Enter Email Address" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="city" class=" form-control-label">Phone Number</label>
                                    <input type="text" id="phone_number" name ="user[phone_number]" value="<?php echo $user->phone_number ?>" placeholder="Enter your Phone Number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="postal-code" class=" form-control-label">New Password</label>
                                    <input type="password" id="password" name ="user[password]" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="country" class=" form-control-label"> Confirm Password</label>
                                    <input type="password" id="confirm_password" name ="user[confirm_password]" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Update User</button>
                        </div>
                    </div>
                </form>
            </div>
        <div class="col-lg-2"></div>
        </div>
    </div>
<?php include_once 'includes/footer.php'; ?>