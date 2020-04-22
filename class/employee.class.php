<?php

class Employee extends Database {

    static protected $table_name = 'employee_salary';
    static protected $db_columns = ['id', 'employee_name', 'employee_address', 'salary_amount', 'given_date'];

    public $id;
    public $employee_name;
    public $employee_address;
    public $salary_amount;
    public $given_date;



    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->employee_name = $args['employee_name'] ?? '';
        $this->employee_address = $args['employee_address'] ?? '';
        $this->salary_amount = $args['salary_amount'] ?? '';
        $this->given_date = $args['given_date'] ?? '';



        // Caution: allows private/protected properties to be set
        // foreach($args as $k => $v) {
        //   if(property_exists($this, $k)) {
        //     $this->$k = $v;
        //   }
        // }
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
