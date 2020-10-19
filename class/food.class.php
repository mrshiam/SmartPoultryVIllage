<?php


class Chicken extends Database
{

    static protected $table_name = 'chicken_purchase';
    static protected $db_columns = ['id', 'batch_name', 'chicken_number', 'chicken_inventory', 'chicken_price', 'per_price', 'purchase_date', 'retailer_name'];


    public $id;
    public $batch_name;
    public $chicken_number;
    public $chicken_inventory;
    public $chicken_price;
    public $per_price;
    public $purchase_date;
    public $retailer_name;


    public function __construct($args = [])
    {
        $this->batch_name = $args['batch_name'] ?? '';
        $this->chicken_number = $args['chicken_number'] ?? '';
        $this->chicken_inventory = $args['chicken_inventory'] ?? '';
        $this->chicken_price = $args['chicken_price'] ?? '';
        $this->per_price = $args['per_price'] ?? '';
        $this->purchase_date = $args['purchase_date'] ?? '';
        $this->retailer_name = $args['retailer_name'] ?? '';
    }


}

class ChickenMortality extends Database
{

    static protected $table_name = 'chicken_mortality';
    static protected $db_columns = ['id', 'chicken_number', 'reason_of_die', 'date'];


    public $id;
    public $chicken_number;
    public $reason_of_die;
    public $date;



    public function __construct($args = [])
    {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->chicken_number = $args['chicken_number'] ?? '';
        $this->reason_of_die = $args['reason_of_die'] ?? '';
        $this->date = $args['date'] ?? '';

    }


}

class ChickenSale extends Database
{

    static protected $table_name = 'chicken_sale';
    static protected $db_columns = ['id', 'batch_name', 'schicken_number', 'per_kg_price', 'tchicken_weight','tamount_money','sale_date','customer_name'];


    public $id;
    public $batch_name;
    public $schicken_number;
    public $per_kg_price;
    public $tchicken_weight;
    public $tamount_money;
    public $sale_date;
    public $customer_name;



    public function __construct($args = [])
    {
        $this->batch_name = $args['batch_name'] ?? '';
        $this->schicken_number = $args['schicken_number'] ?? '';
        $this->per_kg_price = $args['per_kg_price'] ?? '';
        $this->tchicken_weight = $args['tchicken_weight'] ?? '';
        $this->tamount_money = $args['tamount_money'] ?? '';
        $this->sale_date = $args['sale_date'] ?? '';
        $this->customer_name = $args['customer_name'] ?? '';

    }


}


class EggCollection extends Database
{

    static protected $table_name = 'egg_collection';
    static protected $db_columns = ['id', 'egg_number', 'collect_date'];


    public $id;
    public $egg_number;
    public $collect_date;




    public function __construct($args = [])
    {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->egg_number = $args['egg_number'] ?? '';
        $this->collect_date = $args['collect_date'] ?? '';


    }


}

class EggSale extends Database
{

    static protected $table_name = 'egg_sale';
    static protected $db_columns = ['id', 'number_of_egg', 'number_dozen_egg','per_dozen_price','total_money','sale_date','customer_name'];


    public $id;
    public $number_of_egg;
    public $number_dozen_egg;
    public $per_dozen_price;
    public $total_money;
    public $sale_date;
    public $customer_name;




    public function __construct($args = [])
    {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->number_of_egg = $args['number_of_egg'] ?? '';
        $this->number_dozen_egg = $args['number_dozen_egg'] ?? '';
        $this->per_dozen_price = $args['per_dozen_price'] ?? '';
        $this->total_money = $args['total_money'] ?? '';
        $this->sale_date = $args['sale_date'] ?? '';
        $this->customer_name = $args['customer_name'] ?? '';


    }


}


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
