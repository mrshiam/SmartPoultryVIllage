<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['transport'];
    $transport = new Transportation($args);
    $result = $transport->save();

    if($result === true) {


    } else {
        // show errors
    }

} else {
    // display the form
    $transport = new Transportation;
}

?>