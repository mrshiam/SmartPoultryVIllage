<?php

require_once('includes/init.php');
require_login();

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['transport'];
    $transport = new Transportation($args);
    $transport->validate();
    if(empty($transport->errors)){
        $result = $transport->save();
    }else{
        $frm_errors = (serialize($transport->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('transport.php?error=' . $frm_error));
    }


    if($result === true) {
        $session->message('Transport Cost Added successfully.');
        redirect_to(url_for('transportation_cost_report.php'));

    } else {
        // show errors
    }

} else {

}

?>