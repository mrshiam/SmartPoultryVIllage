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
    $cpass = $_POST['current_password'];
    $hash_cpass = $user->set_hashed_password($cpass);

    if($user->hashed_password === $hash_cpass){

    $args = $_POST['user'];
    $user->merge_attributes($args);
    $result = $user->save();
    }else{

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
                <form class="reg_form" action="update_pass.php?id=<?php echo $id ?>" method="post">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="country" class=" form-control-label"> Current Password</label>
                                    <input type="password" id="confirm_password" name ="current_password" placeholder="" class="form-control">
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