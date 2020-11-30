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

    public function validate() {
        $this->errors = [];
        if(is_blank($this->batch_name)) {
            $this->errors[] = "Chicken Batch Name Cannot be Blank";
        }
        if(is_blank($this->chicken_number)) {
            $this->errors[] = "Chicken Number Cannot be Blank";
        }
        if(is_blank($this->chicken_inventory)) {
            $this->errors[] = "Chicken Inventory Cannot be Blank";
        }
        if(is_blank($this->chicken_price)) {
            $this->errors[] = "Chicken Price Cannot be Blank";
        }
        if(is_blank($this->per_price)) {
            $this->errors[] = "Chicken Per Price Cannot be Blank";
        }
        if(is_blank($this->purchase_date)) {
            $this->errors[] = "Chicken Purchase Date Cannot be Blank";
        }
        if(is_blank($this->retailer_name)) {
            $this->errors[] = "Retailer Name Cannot be Blank";
        }
        return $this->errors;
    }


}

class ChickenMortality extends Database
{

    static protected $table_name = 'chicken_mortality';
    static protected $db_columns = ['id', 'chicken_number', 'batch_name', 'reason_of_die', 'date'];


    public $id;
    public $chicken_number;
    public $batch_name;
    public $reason_of_die;
    public $date;



    public function __construct($args = [])
    {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->chicken_number = $args['chicken_number'] ?? '';
        $this->batch_name = $args['batch_name'] ?? '';
        $this->reason_of_die = $args['reason_of_die'] ?? '';
        $this->date = $args['date'] ?? '';

    }

    public function validate() {
        $this->errors = [];
        if(is_blank($this->chicken_number)) {
            $this->errors[] = "Chicken Number Cannot be Blank";
        }
        if(is_blank($this->batch_name)) {
            $this->errors[] = "Chicken Batch Name Cannot be Blank";
        }
        if(is_blank($this->reason_of_die)) {
            $this->errors[] = "Reason field Cannot be Blank";
        }
        if(is_blank($this->date)) {
            $this->errors[] = "Date Cannot be Blank";
        }
        return $this->errors;
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

    public function validate() {
        $this->errors = [];
        if(is_blank($this->batch_name)) {
            $this->errors[] = "Chicken Batch Name Cannot be Blank";
        }
        if(is_blank($this->schicken_number)) {
            $this->errors[] = "Chicken Number Cannot be Blank";
        }
        if(is_blank($this->per_kg_price)) {
            $this->errors[] = "Chicken Per Kg Price Cannot be Blank";
        }
        if(is_blank($this->tchicken_weight)) {
            $this->errors[] = "Chicken Total Weight Cannot be Blank";
        }
        if(is_blank($this->tamount_money)) {
            $this->errors[] = "Chicken Total Amount Money Cannot be Blank";
        }
        if(is_blank($this->sale_date)) {
            $this->errors[] = "Chicken Sale Date Cannot be Blank";
        }
        if(is_blank($this->customer_name)) {
            $this->errors[] = "Customer Name Cannot be Blank";
        }
        return $this->errors;
    }


}

?>
