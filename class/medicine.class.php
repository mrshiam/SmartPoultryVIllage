<?php

class Medicine extends Database {

    static protected $table_name = 'med_item';
    static protected $db_columns = ['med_id', 'med_name', 'med_type', 'med_unit','adding_date'];

    public $med_id;
    public $med_name;
    public $med_type;
    public $med_unit;
    public $adding_date;
    public const MedicineType = [
        1 => 'Powder',
        2 => 'Liquid'
    ];


    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->med_name = $args['med_name'] ?? '';
        $this->med_type = $args['med_type'] ?? '';
        $this->med_unit = $args['med_unit'] ?? '';
        $this->adding_date = $args['adding_date'] ?? '';




    }





}
class MedicinePurchase extends Database {

    static protected $table_name = 'med_purchase';
    static protected $db_columns = ['id','med_id', 'med_unit','med_amount', 'med_price','med_pdate','med_rname'];

    public $id;
    public $med_id;
    public $med_unit;
    public $med_amount;
    public $med_price;
    public $med_pdate;
    public $med_rname;



    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->med_id = $args['med_id'] ?? '';
        $this->med_unit = $args['med_unit'] ?? '';
        $this->med_amount = $args['med_amount'] ?? '';
        $this->med_price = $args['med_price'] ?? '';
        $this->med_pdate = $args['med_pdate'] ?? '';
        $this->med_rname = $args['med_rname'] ?? '';




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





}




?>
