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
        $chickens = Chicken::find_all();
        foreach ($chickens as $chicken) {
            if($chicken->chicken_number > 0 ) {
                $updated_number = ($chicken->chicken_number - $new_number);
            }
        }

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