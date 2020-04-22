<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['food'];
    $food = new Food($args);
    $result = $food->save();

    if($result === true) {
        $new_id = $food->id;
        $_SESSION['message'] = 'The bicycle was created successfully.';

    } else {
        // show errors
    }

} else {
    // display the form
    $food = new Food;
}

?>