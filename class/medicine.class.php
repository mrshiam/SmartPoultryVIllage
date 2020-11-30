<?php

class Medicine extends Database {

    static protected $table_name = 'med_item';
    static protected $db_columns = ['id', 'med_name', 'med_type', 'med_unit', 'med_unit_price', 'adding_date'];

    public $id;
    public $med_name;
    public $med_type;
    public $med_unit;
    public $med_unit_price;
    public $adding_date;



    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->med_name = $args['med_name'] ?? '';
        $this->med_type = $args['med_type'] ?? '';
        $this->med_unit = $args['med_unit'] ?? '';
        $this->med_unit_price = $args['med_unit_price'] ?? '';
        $this->adding_date = $args['adding_date'] ?? '';

    }

    public function validate() {
        $this->errors = [];
        if(is_blank($this->med_name)) {
            $this->errors[] = "Medicine Name Cannot be Blank";
        }
        if(is_blank($this->med_type)) {
            $this->errors[] = "Medicine Type Should be Selected";
        }
        if(is_blank($this->med_unit)) {
            $this->errors[] = "Medicine Unit Cannot be Blank";
        }
        if(is_blank($this->med_unit_price)) {
            $this->errors[] = "Medicine Unit Price Cannot be Blank";
        }
        if(is_blank($this->adding_date)) {
            $this->errors[] = "Medicine Adding Date Cannot be Blank";
        }
        return $this->errors;
    }





}
class MedicinePurchase extends Database {

    static protected $table_name = 'med_purchase';
    static protected $db_columns = ['id','med_id', 'med_unit','med_amount', 'med_price','med_unit_price', 'med_pdate','med_rname'];

    public $id;
    public $med_id;
    public $med_unit;
    public $med_amount;
    public $med_price;
    public $med_unit_price;
    public $med_pdate;
    public $med_rname;



    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->med_id = $args['med_id'] ?? '';
        $this->med_unit = $args['med_unit'] ?? '';
        $this->med_amount = $args['med_amount'] ?? '';
        $this->med_price = $args['med_price'] ?? '';
        $this->med_unit_price = $args['med_unit_price'] ?? '';
        $this->med_pdate = $args['med_pdate'] ?? '';
        $this->med_rname = $args['med_rname'] ?? '';

    }

    public function validate() {
        $this->errors = [];
        if(is_blank($this->med_id)) {
            $this->errors[] = "Medicine Name Should be Selected";
        }
        if(is_blank($this->med_unit)) {
            $this->errors[] = "Medicine Unit Should be Selected";
        }
        if(is_blank($this->med_amount)) {
            $this->errors[] = "Medicine Amount Cannot be Blank";
        }
        if(is_blank($this->med_unit_price)) {
            $this->errors[] = "Medicine Unit Price Cannot be Blank";
        }
        if(is_blank($this->med_pdate)) {
            $this->errors[] = "Medicine Purchase Date Cannot be Blank";
        }
        if(is_blank($this->med_rname)) {
            $this->errors[] = "Retailer Name Cannot be Blank";
        }
        return $this->errors;
    }





}

class MedicineGiven extends Database {

    static protected $table_name = 'med_given';
    static protected $db_columns = ['id', 'med_id', 'med_given_amount','batch_name', 'med_given_date'];

    public $id;
    public $med_id;
    public $med_given_amount;
    public $batch_name;
    public $med_given_date;



    public function __construct($args=[]) {

        $this->med_id = $args['med_id'] ?? '';
        $this->med_given_amount = $args['med_given_amount'] ?? '';
        $this->batch_name = $args['batch_name'] ?? '';
        $this->med_given_date = $args['med_given_date'] ?? '';
    }

    public function validate() {
        $this->errors = [];
        if(is_blank($this->med_id)) {
            $this->errors[] = "Medicine Name Should be Selected";
        }
        if(is_blank($this->med_given_amount)) {
            $this->errors[] = "Medicine Amount Cannot be Blank";
        }
        if(is_blank($this->batch_name)) {
            $this->errors[] = "Chicken Batch Name Should be Selected";
        }
        if(is_blank($this->med_given_date)) {
            $this->errors[] = "Medicine Given Date Cannot be Blank";
        }

        return $this->errors;
    }




}




?>
