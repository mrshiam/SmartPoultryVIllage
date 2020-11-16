<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['food'];
    $foodpurchase = new FoodPurchase($args);
    $result = $foodpurchase->save();

    if($result === true) {
        $foodid = $foodpurchase->food_id;
        $unitprice = $foodpurchase->food_unit_price;
        $sql = "UPDATE food_item SET ";
        $sql .= "food_unit_price='" . $unitprice . "' ";
        $sql .= "WHERE id='" . $foodid . "'";
        $sql .= "LIMIT 1";
        $result = Database::$database->query($sql);
        return $result;

    } else {
        // show errors
    }

} else {

}

?>