<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['gfood'];
    $given_food = new FoodGiven($args);
    $result = $given_food->save();

    if($result === true) {

    } else {
        // show errors
    }

} else {
    // display the form
    $given_food = new FoodGiven;
}

?>