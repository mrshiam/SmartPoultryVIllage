<?php

class Food extends Database {

    static protected $table_name = 'food_purchase';
    static protected $db_columns = ['id', 'food_name', 'food_amount', 'food_price', 'purchase_date', 'retailer_name'];


    public $id;
    public $food_name;
    public $food_amount;
    public $food_price;
    public $purchase_date;
    public $retailer_name;


    public function __construct($args=[])
    {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->food_name = $args['food_name'] ?? '';
        $this->food_amount = $args['food_amount'] ?? '';
        $this->food_price = $args['food_price'] ?? '';
        $this->purchase_date = $args['purchase_date'] ?? '';
        $this->retailer_name = $args['retailer_name'] ?? '';
    }



    public function name() {
        return "{$this->brand} {$this->model} {$this->year}";
    }
    public function weight_kg() {
        return number_format($this->weight_kg, 2) . ' kg';
    }

    public function set_weight_kg($value) {
        $this->weight_kg = floatval($value);
    }

    public function weight_lbs() {
        $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
        return number_format($weight_lbs, 2) . ' lbs';
    }

    public function set_weight_lbs($value) {
        $this->weight_kg = floatval($value) / 2.2046226218;
    }

    public function condition() {
        if($this->condition_id > 0) {
            return self::CONDITION_OPTIONS[$this->condition_id];
        } else {
            return "Unknown";
        }
    }




}

?>
