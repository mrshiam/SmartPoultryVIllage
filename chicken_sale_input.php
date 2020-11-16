<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['chicken'];
    $chicken_sale = new ChickenSale($args);
    $result = $chicken_sale->save();


    if($result === true) {
        $sold_number = $chicken_sale->schicken_number;
        $chicken_batch_name = $chicken_sale->batch_name;

        $chickens = Chicken::find_all();
        foreach ($chickens as $chicken) {
            if($chicken->chicken_inventory > 0 ) {
                $updated_chicken = ($chicken->chicken_number - $sold_number);
            }
        }

        $sql = "UPDATE chicken_purchase SET ";
        $sql .= "chicken_number='" . $updated_chicken . "' ";
        $sql .= "WHERE batch_name='" . $chicken_batch_name . "'";
        $sql .= "LIMIT 1";
        $result = Chicken::$database->query($sql);





    } else {
        // show errors
    }

} else {
    // display the form
    $chicken_sale = new ChickenSale;
}

?>