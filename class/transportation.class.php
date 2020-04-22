<?php

class Transportation extends Database {

    static protected $table_name = 'transpotation';
    static protected $db_columns = ['id', 'transport_name', 'reason_use', 'transport_cost', 'used_date'];

    public $id;
    public $transport_name;
    public $reason_use;
    public $transport_cost;
    public $used_date;



    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->transport_name = $args['transport_name'] ?? '';
        $this->reason_use = $args['reason_use'] ?? '';
        $this->transport_cost = $args['transport_cost'] ?? '';
        $this->used_date = $args['used_date'] ?? '';



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
