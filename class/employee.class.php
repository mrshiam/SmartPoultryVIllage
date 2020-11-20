<?php

class Employee extends Database {

    static protected $table_name = 'employee_salary';
    static protected $db_columns = ['id', 'employee_name', 'employee_address', 'employee_phone', 'salary_amount', 'given_date'];

    public $id;
    public $employee_name;
    public $employee_address;
    public $employee_phone;
    public $salary_amount;
    public $given_date;



    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->employee_name = $args['employee_name'] ? $args['employee_name']: '';
        $this->employee_address = $args['employee_address'] ? $args['employee_address']: '';
        $this->employee_phone = $args['employee_phone'] ? $args['employee_phone']: '';
        $this->salary_amount = $args['salary_amount'] ? $args['salary_amount']:'';
        $this->given_date = $args['given_date'] ?  $args['given_date']:'';
    }






}

?>
