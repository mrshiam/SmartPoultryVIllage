<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['oexpenses'];
    $oexpenses = new OtherExpenses($args);
    $result = $oexpenses->save();

    if($result === true) {
        $new_id = $oexpenses->id;
        $_SESSION['message'] = 'The bicycle was created successfully.';

    } else {
        // show errors
    }

} else {
    // display the form
    $oexpenses = new OtherExpenses;
}

?>