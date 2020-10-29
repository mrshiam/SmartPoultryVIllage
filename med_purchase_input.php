<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['med'];
    $med = new MedicinePurchase($args);
    $result = $med->save();

    if($result === true) {


    } else {
        // show errors
    }

} else {
    // display the form
    $med = new MedicinePurchase;
}

?>