<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['food'];
    $foodpurchase = new FoodPurchase($args);

    $result = $foodpurchase->save();

    if($result === true) {


    } else {
        // show errors
    }

} else {
    // display the form
    $foodpurchase = new FoodPurchase;
}

?>