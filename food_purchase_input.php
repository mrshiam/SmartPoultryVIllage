<?php

require_once('includes/init.php');
require_login();
if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['food'];
    $foodpurchase = new FoodPurchase($args);
    $foodid = $foodpurchase->food_id;
    $unitprice = $foodpurchase->food_unit_price;
    $sql = "UPDATE food_item SET ";
    $sql .= "food_unit_price='" . $unitprice . "' ";
    $sql .= "WHERE id='" . $foodid . "'";
    $sql .= "LIMIT 1";
    $result = Database::$database->query($sql);

    $foodpurchase->validate();
    if(empty($foodpurchase->errors)){
        $result = $foodpurchase->save();
    }else{
        $frm_errors = (serialize($foodpurchase->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('food_purchase.php?error=' . $frm_error));
    }

    if($result === true) {

        $session->message('Food Purchase Details Added successfully.');
        redirect_to(url_for('food_purchase_repo.php'));

    } else {
        // show errors
    }

} else {

}

?>