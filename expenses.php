<?php

require_once('includes/init.php');
require_login();

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['oexpenses'];
    $oexpenses = new OtherExpenses($args);
    $oexpenses->validate();
    if(empty($oexpenses->errors)){
        $result = $oexpenses->save();
    }else{
        $frm_errors = (serialize($oexpenses->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('other_expenses.php?error=' . $frm_error));
    }

    if($result === true) {
        $session->message('Other Expenses Added successfully.');
        redirect_to(url_for('oexpances_repo.php'));

    } else {
        // show errors
    }

} else {

}

?>