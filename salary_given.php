<?php

require_once('includes/init.php');
require_login();

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['employee'];
    $employee = new Employee($args);
    $employee->validate();
    if(empty($employee->errors)){
        $result = $employee->save();
    }else{
        $frm_errors = (serialize($employee->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('employee_salary.php?error=' . $frm_error));
    }

    if($result === true) {
        $session->message('Employee Salary Added successfully.');
        redirect_to(url_for('employee_salary_repo.php'));


    } else {
        // show errors
    }

} else {

}

?>