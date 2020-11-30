<?php

require_once('includes/init.php');
require_login();

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['med'];
    $med = new MedicinePurchase($args);
    $medid = $med->med_id;
    $unitprice = $med->med_unit_price;
    $sql = "UPDATE med_item SET ";
    $sql .= "med_unit_price='" . $unitprice . "' ";
    $sql .= "WHERE id='" . $medid . "'";
    $sql .= "LIMIT 1";
    $result = Database::$database->query($sql);
    $med->validate();
    if(empty($med->errors)){
        $result = $med->save();
    }else{
        $frm_errors = (serialize($med->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('med_purchase.php?error=' . $frm_error));
    }

    if($result === true) {
        $session->message('Medicine Purchase Details Added successfully.');
        redirect_to(url_for('med_purchase_repo.php'));


    } else {
        // show errors
    }

} else {

}

?>