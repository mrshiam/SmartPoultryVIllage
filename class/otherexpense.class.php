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

    public function validate() {
        $this->errors = [];
        if(is_blank($this->element_name)) {
            $this->errors[] = "Element Name Cannot be Blank";
        }
        if(is_blank($this->buying_reason)) {
            $this->errors[] = "Reason Cannot be Blank";
        }
        if(is_blank($this->element_price)) {
            $this->errors[] = "Amount of Money Cannot be Blank";
        }
        if(is_blank($this->buying_date)) {
            $this->errors[] = "Buying Date Cannot be Blank";
        }
        return $this->errors;
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

    public function validate() {
        $this->errors = [];
        if(is_blank($this->customer_name)) {
            $this->errors[] = "Customer Name Cannot be Blank";
        }
        if(is_blank($this->customer_address)) {
            $this->errors[] = "Customer Address Cannot be Blank";
        }
        if(is_blank($this->customer_phone)) {
            $this->errors[] = "Customer Phone Number Cannot be Blank";
        }elseif (!has_length($this->customer_phone, array('min' => 11, 'max' => 11))) {
            $this->errors[] = "Phone Number Must be 11 Digit";
        }elseif (!preg_match('/[0-9]/', $this->customer_phone)) {
            $this->errors[] = "Phone Number Must Be in number";
        }
        return $this->errors;
    }

}

?>
