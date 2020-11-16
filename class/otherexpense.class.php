<?php

class OtherExpenses extends Database {

    static protected $table_name = 'other_expenses';
    static protected $db_columns = ['id', 'element_name', 'buying_reason', 'element_price', 'buying_date'];

    public $id;
    public $element_name;
    public $buying_reason;
    public $element_price;
    public $buying_date;



    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->element_name = $args['element_name'] ?? '';
        $this->buying_reason = $args['buying_reason'] ?? '';
        $this->element_price = $args['element_price'] ?? '';
        $this->buying_date = $args['buying_date'] ?? '';



    }






}

class Customer extends Database{
    static protected $table_name = 'customer_details';
    static protected $db_columns = ['id', 'customer_name', 'customer_address', 'customer_phone'];

    public $id;
    public $customer_name;
    public $customer_address;
    public $customer_phone;





    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->customer_name = $args['customer_name'] ?? '';
        $this->customer_address = $args['customer_address'] ?? '';
        $this->customer_phone = $args['customer_phone'] ?? '';


    }

}

?>
