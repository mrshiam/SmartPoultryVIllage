<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['customer'];
    $buyer = new Customer($args);
    $result = $buyer->save();

    if($result === true) {


    } else {
        // show errors
    }

} else {
    // display the form
    $buyer = new Customer;
}

?>