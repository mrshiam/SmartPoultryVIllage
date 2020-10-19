<?php

require_once('includes/init.php');

if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['egg'];
    $egg_sale = new EggSale($args);
    $result = $egg_sale->save();

    if($result === true) {
        $new_id = $egg_sale->id;


        $_SESSION['message'] = 'The bicycle was created successfully.';
        $sold_number = $egg_sale->number_dozen_egg;

        $eggs = EggCollection::find_all();
        foreach ($eggs as $egg) {
            if($egg->egg_number > 0) {
                $updated_egg_number = ($egg->egg_number - $sold_number);
            }
       }

       $sql = "UPDATE egg_collection SET ";
        $sql .= "egg_number='" . $updated_egg_number . "' ";
        $sql .= "LIMIT 1";
        $result = EggCollection::$database->query($sql);





    } else {
        // show errors
    }

} else {
    // display the form
    $egg_sale = new EggSale;
}

?>