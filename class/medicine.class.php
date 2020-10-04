<?php

class Medicine extends Database {

    static protected $table_name = 'med_purchase';
    static protected $db_columns = ['id', 'med_name', 'med_type', 'med_unit', 'med_amount', 'med_price', 'med_pdate','med_rname'];

    public $id;
    public $med_name;
    public $med_type;
    public $med_unit;
    public $med_amount;
    public $med_price;
    public $med_pdate;
    public $med_rname;
    public const MedicineType = [
        1 => 'Powder',
        2 => 'Liquid'
    ];


    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->med_name = $args['med_name'] ?? '';
        $this->med_type = $args['med_type'] ?? '';
        $this->med_unit = $args['med_unit'] ?? '';
        $this->med_amount = $args['med_amount'] ?? '';
        $this->med_price = $args['med_price'] ?? '';
        $this->med_pdate = $args['med_pdate'] ?? '';
        $this->med_rname = $args['med_rname'] ?? '';



    }





}

class MedicineGiven extends Database {

    static protected $table_name = 'med_given';
    static protected $db_columns = ['id', 'gmed_name', 'med_given_amount', 'med_given_date'];

    public $id;
    public $gmed_name;
    public $med_given_amount;
    public $med_given_date;



    public function __construct($args=[]) {

        $this->gmed_name = $args['gmed_name'] ?? '';
        $this->med_given_amount = $args['med_given_amount'] ?? '';
        $this->med_given_date = $args['med_given_date'] ?? '';




    }





}




?>
