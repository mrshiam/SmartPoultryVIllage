<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['food'];
    $food = new Food($args);
    $result = $food->save();

    if($result === true) {


    } else {
        // show errors
    }

} else {
    // display the form
    $food = new Food;
}

?>