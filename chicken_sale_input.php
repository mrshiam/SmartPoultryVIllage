<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['chicken'];
    $chicken_sale = new ChickenSale($args);
    $sale_batch_name = $chicken_sale->batch_name;
    $sql = "SELECT batch_name,chicken_number FROM chicken_purchase WHERE batch_name='$sale_batch_name'";
    $chickeninventorys = Database::$database->query($sql);
    foreach ($chickeninventorys as $chickeninventory=>$value){
        $ci_batch_name = $value['batch_name'];
        $ci_invent = $value['chicken_number'];
    }

    if($chicken_sale->batch_name===$ci_batch_name && $chicken_sale->schicken_number <= $ci_invent) {
        $result = $chicken_sale->save();
    }else{
        redirect_to(url_for('chicken_purchase.php'));
    }

    if($result === true) {
        $sold_number = $chicken_sale->schicken_number;
        $chicken_batch_name = $chicken_sale->batch_name;
        $sql = "SELECT * FROM chicken_purchase WHERE batch_name='$chicken_batch_name'";
        $chickens = Database::$database->query($sql);
        foreach ($chickens as $chicken=>$value) {
            $total_chicken = $value['chicken_number'];
        }
        $updated_chicken = ($total_chicken - $sold_number);
        $sql = "UPDATE chicken_purchase SET chicken_number='$updated_chicken' WHERE batch_name='$chicken_batch_name'";
        $result = Database::$database->query($sql);
    } else {
        // show errors
    }

} else {
    // display the form

}

?>