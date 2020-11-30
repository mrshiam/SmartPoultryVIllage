<?php

require_once('includes/init.php');
require_login();

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['food'];
    $food = new Food($args);
    $food->validate();
    if(empty($food->errors)){
        $result = $food->save();
    }else{
        $frm_errors = (serialize($food->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('add_fooditem.php?error=' . $frm_error));
    }


    if($result === true) {
        $session->message('Food Item Added successfully.');
        redirect_to(url_for('food_item.php'));

    } else {
        // show errors
    }

} else {
    // display the form

}

?>