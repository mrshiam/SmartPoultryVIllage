<?php

class FoodGiven extends Database {

    static protected $table_name = 'food_given';
    static protected $db_columns = ['g_id', 'gfood_name', 'gfood_amount', 'given_date'];


    public $g_id;
    public $gfood_name;
    public $gfood_amount;
    public $given_date;

    public function __construct($args=[])
    {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->gfood_name = $args['gfood_name'] ?? '';
        $this->gfood_amount = $args['gfood_amount'] ?? '';
        $this->given_date = $args['given_date'] ?? '';

    }







}

?>
