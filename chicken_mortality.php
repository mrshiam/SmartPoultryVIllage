<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['chicken'];
    $mortality = new ChickenMortality($args);
    $result = $mortality->save();

    if($result === true) {
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
        return $result;




    } else {
        // show errors
    }

} else {
    // display the form
    $mortality = new ChickenMortality;
}

?>