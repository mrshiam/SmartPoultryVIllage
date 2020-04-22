<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['gfood'];
    $given_food = new FoodGiven($args);
    $result = $given_food->save();

    if($result === true) {
        $new_amount = $given_food->gfood_amount;
        $food_type = $given_food->gfood_name;
        $foods = Food::find_all();
        foreach ($foods as $food) {
            $updated_amount = ($food->food_amount - $new_amount);
        }

        $sql = "UPDATE food_purchase SET ";
        $sql .= "food_amount='" . $updated_amount . "' ";
        $sql .= "WHERE food_name='" . $food_type . "' ";
        $sql .= "LIMIT 1";
        $result = Database::$database->query($sql);
        return $result;

        $_SESSION['message'] = 'The bicycle was created successfully.';


    } else {
        // show errors
    }

} else {
    // display the form
    $given_food = new FoodGiven;
}

?>