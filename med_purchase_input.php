<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['med'];
    $med = new MedicinePurchase($args);
    $result = $med->save();

    if($result === true) {
        $medid = $med->med_id;
        $unitprice = $med->med_unit_price;
        $sql = "UPDATE med_item SET ";
        $sql .= "med_unit_price='" . $unitprice . "' ";
        $sql .= "WHERE id='" . $medid . "'";
        $sql .= "LIMIT 1";
        $result = Database::$database->query($sql);
        return $result;


    } else {
        // show errors
    }

} else {
    // display the form
    $med = new MedicinePurchase;
}

?>