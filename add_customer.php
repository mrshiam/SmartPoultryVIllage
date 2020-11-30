<?php

require_once('includes/init.php');
require_login();

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['customer'];
    $buyer = new Customer($args);
    $buyer->validate();
    if(empty($buyer->errors)){
        $result = $buyer->save();
    }else{
        $frm_errors = (serialize($buyer->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('customer_details.php?error=' . $frm_error));
    }

    if($result === true) {
        $session->message('Customer Details Added successfully.');
        redirect_to(url_for('customer_details_repo.php'));

    } else {
        // show errors
    }

} else {

}

?>