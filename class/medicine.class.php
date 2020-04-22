<?php

class Medicine extends Database {

    static protected $table_name = 'medicine_purchase';
    static protected $db_columns = ['id', 'med_name', 'med_type', 'med_amount', 'med_price', 'med_pdate','med_rname'];

    public $id;
    public $med_name;
    public $med_type;
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
        $this->med_amount = $args['med_amount'] ?? '';
        $this->med_price = $args['med_price'] ?? '';
        $this->med_pdate = $args['med_pdate'] ?? '';
        $this->med_rname = $args['med_rname'] ?? '';



    }





}

?>
