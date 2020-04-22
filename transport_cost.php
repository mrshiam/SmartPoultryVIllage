<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['transport'];
    $transport = new Transportation($args);
    $result = $transport->save();

    if($result === true) {
        $new_id = $transport->id;
        $_SESSION['message'] = 'The bicycle was created successfully.';

    } else {
        // show errors
    }

} else {
    // display the form
    $transport = new Transportation;
}

?>