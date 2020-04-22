<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['employee'];
    $employee = new Employee($args);
    $result = $employee->save();

    if($result === true) {
        $new_id = $employee->id;
        $_SESSION['message'] = 'The bicycle was created successfully.';

    } else {
        // show errors
    }

} else {
    // display the form
    $employee = new Employee;
}

?>