<?php
require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['user'];
    $users = new User($args);
    $result = $users->save();

    if($result === true) {
        redirect_to(url_for('login_form.php'));

    } else {
        // show errors
    }

} else {
    // display the form
    $users = new User;
}

?>