<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['med'];
    $food_distributed = new MedicineGiven($args);
    $result = $food_distributed->save();

    if($result === true) {
        $new_amount = $food_distributed->med_given_amount;
        $given_med_name = $food_distributed->gmed_name;
        $purchased_medicine = Medicine::find_all();
        foreach ($purchased_medicine as $purchased_med) {
            if($purchased_med->med_amount > 0) {
                $new_med_amount = ($purchased_med->med_amount - $new_amount);
            }
        }

        $sql = "UPDATE med_purchase SET ";
        $sql .= "med_amount='" . $new_med_amount . "' ";
        $sql .= "WHERE med_name='" . $given_med_name . "' ";
        $sql .= "LIMIT 1";
        $result = Database::$database->query($sql);





    } else {
        // show errors
    }

} else {
    // display the form
    $mortality = new MedicineGiven;
}

?>