<?php

require_once('includes/init.php');
require_login();

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['med'];
    $med = new Medicine($args);
    $med->validate();
    if(empty($med->errors)){
        $result = $med->save();
    }else{
        $frm_errors = (serialize($med->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('add_meditem.php?error=' . $frm_error));
    }


    if($result === true) {
        $session->message('Medicine Item Added successfully.');
        redirect_to(url_for('med_item.php'));


    } else {
        // show errors
    }

} else {
    // display the form
    $med = new Medicine;
}

?>