<?php

class Food extends Database {

    static protected $table_name = 'food_item';
    static protected $db_columns = ['id', 'food_name','food_unit_price','adding_date'];


    public $id;
    public $food_name;
    public $food_unit_price;
    public $adding_date;



    public function __construct($args=[])
    {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->food_name = $args['food_name'] ?? '';
        $this->food_unit_price = $args['food_unit_price'] ?? '';
        $this->adding_date = $args['adding_date'] ?? '';

    }

    public function validate() {
        $this->errors = [];
        if(is_blank($this->food_name)) {
            $this->errors[] = "Food Name Cannot be Blank";
        }
        if(is_blank($this->food_unit_price)) {
            $this->errors[] = "Food Unit Price Cannot be Blank";
        }
        if(is_blank($this->adding_date)) {
            $this->errors[] = "Food Adding Time Cannot be Blank";
        }
        return $this->errors;
    }











}

class FoodPurchase extends Database {

    static protected $table_name = 'food_purchase_detail';
    static protected $db_columns = ['id','food_id','food_amount','food_price','food_unit_price','purchase_date','retailer_name'];

    public $id;
    public $food_id;
    public $food_amount;
    public $food_price;
    public $food_unit_price;
    public $purchase_date;
    public $retailer_name;



    public function __construct($args=[])
    {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->food_id = $args['food_id'] ?? '';
        $this->food_amount = $args['food_amount'] ?? '';
        $this->food_price = $args['food_price'] ?? '';
        $this->food_unit_price = $args['food_unit_price'] ?? '';
        $this->purchase_date = $args['purchase_date'] ?? '';
        $this->retailer_name = $args['retailer_name'] ?? '';

    }

    public function validate() {
        $this->errors = [];
        if(is_blank($this->food_id)) {
            $this->errors[] = "Food Name Should be Selected";
        }
        if(is_blank($this->food_amount)) {
            $this->errors[] = "Food Amount Cannot be Blank";
        }
        if(is_blank($this->food_price)) {
            $this->errors[] = "Food Price Cannot be Blank";
        }
        if(is_blank($this->food_unit_price)) {
            $this->errors[] = "Food Unit Price Cannot be Blank";
        }
        if(is_blank($this->purchase_date)) {
            $this->errors[] = "Food Purchase Date Cannot be Blank";
        }
        if(is_blank($this->retailer_name)) {
            $this->errors[] = "Retailer Name Cannot be Blank";
        }
        return $this->errors;
    }







}

class FoodGiven extends Database {

    static protected $table_name = 'food_given';
    static protected $db_columns = ['id', 'food_id', 'gfood_amount', 'batch_name', 'given_date'];


    public $id;
    public $food_id;
    public $gfood_amount;
    public $batch_name;
    public $given_date;

    public function __construct($args=[])
    {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->food_id = $args['food_id'] ?? '';
        $this->gfood_amount = $args['gfood_amount'] ?? '';
        $this->batch_name = $args['batch_name'] ?? '';
        $this->given_date = $args['given_date'] ?? '';

    }

    public function validate() {
        $this->errors = [];
        if(is_blank($this->food_id)) {
            $this->errors[] = "Food Name Should be Selected";
        }
        if(is_blank($this->gfood_amount)) {
            $this->errors[] = "Food Given Amount Cannot be Blank";
        }
        if(is_blank($this->batch_name)) {
            $this->errors[] = "Chicken Batch Name Should be Selected";
        }
        if(is_blank($this->given_date)) {
            $this->errors[] = "Given Date Cannot be Blank";
        }
        return $this->errors;
    }







}

?>



