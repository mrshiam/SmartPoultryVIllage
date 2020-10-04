<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['chicken'];
    $chicken = new Chicken($args);
    $result = $chicken->save();

    if($result === true) {
        $new_id = $chicken->id;
        $_SESSION['message'] = 'The bicycle was created successfully.';

    } else {
        // show errors
    }

} else {
    // display the form
    $chicken = new Chicken;
}

?>