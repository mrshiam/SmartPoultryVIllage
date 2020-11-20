<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['med'];
    $med = new MedicineGiven($args);
    $mid = $med->med_id;
    $sql = "SELECT med_item.id,q1.MedPurchase,q2.MedGiven,(q1.MedPurchase-q2.MedGiven) AS 'TotalAmount' FROM `med_item`
            LEFT JOIN
            (SELECT med_id,SUM(med_amount) AS 'MedPurchase' FROM med_purchase GROUP BY med_id) AS q1
            ON q1.med_id = med_item.id
            LEFT JOIN
            (SELECT med_id,SUM(med_given_amount) AS 'MedGiven' FROM `med_given` GROUP BY med_id) AS q2
            ON q2.med_id = med_item.id WHERE id='$mid'
            ";
    $medinventorys = Database::$database->query($sql);
    foreach ($medinventorys as $medinventory=>$value){
        $med_invent_id = $value['id'];
        $med_invent_total = $value['TotalAmount'];
    }
    if($med->med_id==$med_invent_id && $med->med_given_amount <= $med_invent_total) {
        $result = $med->save();
    }else{
        redirect_to(url_for('med_purchase.php'));
    }

    if($result === true) {


    } else {
        // show errors
    }

} else {
    // display the form
    $med = new MedicineGiven;
}

?>