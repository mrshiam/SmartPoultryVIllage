<?php

class Transportation extends Database {

    static protected $table_name = 'transpotation';
    static protected $db_columns = ['id', 'transport_name', 'batch_name', 'transport_cost', 'used_date'];

    public $id;
    public $transport_name;
    public $batch_name;
    public $transport_cost;
    public $used_date;



    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->transport_name = $args['transport_name'] ?? '';
        $this->batch_name = $args['batch_name'] ?? '';
        $this->transport_cost = $args['transport_cost'] ?? '';
        $this->used_date = $args['used_date'] ?? '';

    }

    public function validate() {
        $this->errors = [];
        if(is_blank($this->transport_name)) {
            $this->errors[] = "Trasnport Name Cannot be Blank";
        }
        if(is_blank($this->batch_name)) {
            $this->errors[] = "Chicken Batch Name Should Be Selected";
        }
        if(is_blank($this->transport_cost)) {
            $this->errors[] = "Trasnport Cost Cannot be Blank";
        }
        if(is_blank($this->used_date)) {
            $this->errors[] = "Using Date Cannot be Blank";
        }
        return $this->errors;
    }






}

?>
