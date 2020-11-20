<?php include_once 'includes/head.php' ?>
<?php include_once 'includes/top_bar.php'; ?>
<?php include_once 'includes/nav_bar.php' ?>
<?php
require_once('includes/init.php');
$errors = [];
$email = '';
$password = '';

if(is_post_request()) {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validations
    if(is_blank($email)) {
        $errors[] = "Email cannot be blank.";
    }
    if(is_blank($password)) {
        $errors[] = "Password cannot be blank.";
    }

    // if there were no errors, try to login
    if(empty($errors)) {
        $user = User::find_by_email($email);
        // test if admin found and password is correct
        if($user != false && $user->verify_password($password)) {
            $session->login($user);
            $id = $user->id;
            redirect_to(url_for('dashboard.php?id=' .$id));
        } else {
            // username not found or password does not match
            $errors[] = "Log in was unsuccessful.";
        }

    }

}

?>

<section>
    <div class="row">
        <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header text-center img_card">
                        <img src="images/chicken.png" alt="">
                        <h3><u>Login Form</u></h3>
                        <?php echo display_errors($errors); ?>
                    </div>
                    <div class="card-body card-block">
                        <form action="login_form.php" method="post" class="">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-asterisk"></i>
                                    </div>
                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-success btn-sm">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="col-lg-4"></div>
    </div>
</section>






























<?php include_once 'includes/footer.php'; ?>
