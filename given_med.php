<?php

require_once('includes/init.php');
require_login();

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
    foreach ($medinventorys as $medinventory => $value) {
        $med_invent_id = $value['id'];
        $med_invent_total = $value['TotalAmount'];
    }
    if (!empty($med_invent_total)) {
        if ($med->med_id == $med_invent_id && $med->med_given_amount <= $med_invent_total) {

        } else {
            $session->message('There is not sufficient Medicine for this item in the stoke.');
            redirect_to(url_for('med_inventory.php'));
        }
        $med->validate();
        if (empty($med->errors)) {
            $result = $med->save();

    } else {
        $frm_errors = (serialize($med->errors));
        $frm_error = (urlencode($frm_errors));
        redirect_to(url_for('medicine_given.php?error=' . $frm_error));
    }
}else{
        $med->validate();
        if (empty($med->errors)) {
            $result = $med->save();

        } else {
            $frm_errors = (serialize($med->errors));
            $frm_error = (urlencode($frm_errors));
            redirect_to(url_for('medicine_given.php?error=' . $frm_error));
        }
    }

    if($result === true) {
        $session->message('Medicine Given Data Added successfully.');
        redirect_to(url_for('med_given_repo.php'));

    } else {
        // show errors
    }

} else {
    // display the form
}

?>