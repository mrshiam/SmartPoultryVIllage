<?php

require_once('includes/init.php');
require_login();

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['chicken'];
    $chicken = new Chicken($args);
    $chicken->validate();
    if(empty($chicken->errors)){
        $result = $chicken->save();
    }else{
        $frm_errors = (serialize($chicken->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('chicken_purchase.php?error=' . $frm_error));
    }


    if($result === true) {
        $session->message('Chicken Purchase Added successfully.');
        redirect_to(url_for('chicken_purchase_repo.php'));

    } else {
        // show errors
    }

} else {

}

?>