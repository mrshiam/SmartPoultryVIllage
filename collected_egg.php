<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['egg'];
    $collected_egg = new EggCollection($args);
    $result = $collected_egg->save();

    if($result === true) {
        $new_id = $collected_egg->id;
        $_SESSION['message'] = 'The bicycle was created successfully.';

    } else {
        // show errors
    }

} else {
    // display the form
    $collected_egg = new EggCollection;
}

?>