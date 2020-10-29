<?php

class FoodGiven extends Database {

    static protected $table_name = 'food_given';
    static protected $db_columns = ['id', 'gfood_id', 'gfood_amount', 'batch_name', 'given_date'];


    public $id;
    public $gfood_id;
    public $gfood_amount;
    public $batch_name;
    public $given_date;

    public function __construct($args=[])
    {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->gfood_id = $args['food_id'] ?? '';
        $this->gfood_amount = $args['gfood_amount'] ?? '';
        $this->batch_name = $args['batch_name'] ?? '';
        $this->given_date = $args['given_date'] ?? '';

    }







}

?>
