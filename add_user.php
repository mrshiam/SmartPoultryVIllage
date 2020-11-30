<?php
require_once('includes/init.php');


if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['user'];
    $users = new User($args);
    $users->validate();
    if(empty($users->errors)){
        $result = $users->save();
    }else{
        $frm_errors = (serialize($users->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('reg_form.php?error=' . $frm_error));
    }


    if($result === true) {
        $session->message('Account has created successfully.');
        redirect_to(url_for('login_form.php'));

    } else {
        // show errors
    }

} else {
    // display the form
    $users = new User;
}

?>