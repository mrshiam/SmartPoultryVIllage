<?php

require_once('includes/init.php');


if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['gfood'];
    $given_food = new FoodGiven($args);
    $fid = $given_food->food_id;
    $sql = "SELECT food_item.id,q1.TotalFood,q2.GivenFood,(q1.TotalFood-q2.GivenFood) AS 'TotalAmount' FROM food_item
            LEFT JOIN
            (SELECT food_id,SUM(food_amount) AS 'TotalFood' FROM `food_purchase_detail` GROUP BY food_id) AS q1
            ON q1.food_id = food_item.id
            LEFT JOIN
            (SELECT food_id,SUM(gfood_amount) AS 'GivenFood' FROM `food_given` GROUP BY food_id) AS q2
            ON q2.food_id = food_item.id WHERE id='$fid'";
    $foodinventorys = Database::$database->query($sql);
    foreach ($foodinventorys as $foodinventory => $value) {
        $invent_id = $value['id'];
        $invent_total = $value['TotalAmount'];
    }
    if(!empty($invent_total)){
        if ($given_food->food_id == $invent_id && $given_food->gfood_amount <= $invent_total) {

        } else {
            $session->message('There is not sufficient food for this item in the stoke.');
            redirect_to(url_for('food_inventory.php'));
        }
        $given_food->validate();
        if (empty($given_food->errors)) {
            $result = $given_food->save();
        } else {
            $frm_errors = (serialize($given_food->errors));
            $frm_error = (urlencode($frm_errors));
            redirect_to(url_for('food_given.php?error=' . $frm_error));
        }
    }else{
        $given_food->validate();
        if (empty($given_food->errors)) {
            $result = $given_food->save();
        } else {
            $frm_errors = (serialize($given_food->errors));
            $frm_error = (urlencode($frm_errors));
            redirect_to(url_for('food_given.php?error=' . $frm_error));
        }

    }
    if($result === true) {
        $session->message('Food Given Data Added successfully.');
        redirect_to(url_for('food_given_repo.php'));

    } else {
        // show errors

    }

} else {
    // display the form

}

?>