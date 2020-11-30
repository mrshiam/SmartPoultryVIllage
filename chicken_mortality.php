<?php

require_once('includes/init.php');
require_login();

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['chicken'];
    $mortality = new ChickenMortality($args);
    $new_number = $mortality->chicken_number;
    $b_name = $mortality->batch_name;
    $sql = "SELECT * FROM chicken_purchase WHERE batch_name='$b_name'";
    $chickens = Database::$database->query($sql);
    foreach ($chickens as $chicken=>$value) {
        $total_chicken = $value['chicken_number'];
    }
    $updated_number = ($total_chicken - $new_number);

    $sql = "UPDATE chicken_purchase SET ";
    $sql .= "chicken_number='" . $updated_number . "' ";
    $sql .= "WHERE batch_name='" . $b_name . "'";
    $sql .= "LIMIT 1";
    $result = Database::$database->query($sql);
    $mortality->validate();
    if(empty($mortality->errors)){
        $result = $mortality->save();
    }else{
        $frm_errors = (serialize($mortality->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('chicken_track.php?error=' . $frm_error));
    }

    if($result === true) {

        $session->message('Chicken Mortality Added successfully.');
        redirect_to(url_for('chicken_inven_repo.php'));



    } else {
        // show errors
    }

} else {

}

?>