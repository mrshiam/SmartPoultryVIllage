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
            if($chicken->chicken_inventory > 0 AND $chicken->batch_name == $chicken_batch_name) {
                $updated_chicken = ($chicken->chicken_inventory - $sold_number);
            }
        }

        $sql = "UPDATE chicken_purchase SET ";
        $sql .= "chicken_inventory='" . $updated_chicken . "' ";
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