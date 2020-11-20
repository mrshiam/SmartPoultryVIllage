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
            foreach ($foodinventorys as $foodinventory=>$value){
                $invent_id = $value['id'];
                $invent_total = $value['TotalAmount'];
            }
    if($given_food->food_id==$invent_id && $given_food->gfood_amount <= $invent_total){
        $result = $given_food->save();
    }else {
        redirect_to(url_for('food_purchase.php'));
    }
    if($result === true) {

    } else {
        // show errors

    }

} else {
    // display the form

}

?>