<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['med'];
    $med = new Medicine($args);
    $result = $med->save();

    if($result === true) {
        $new_id = $med->id;
        $_SESSION['message'] = 'The bicycle was created successfully.';

    } else {
        // show errors
    }

} else {
    // display the form
    $med = new Medicine;
}

?>