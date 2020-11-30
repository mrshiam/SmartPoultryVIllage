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
        $this->employee_name = $args['employee_name'] ?? '';
        $this->employee_address = $args['employee_address'] ?? '';
        $this->employee_phone = $args['employee_phone'] ?? '';
        $this->salary_amount = $args['salary_amount'] ?? '';
        $this->given_date = $args['given_date'] ?? '';
    }

    public function validate() {
        $this->errors = [];
        if(is_blank($this->employee_name)) {
            $this->errors[] = "Employee Name Cannot be Blank";
        }
        if(is_blank($this->employee_address)) {
            $this->errors[] = "Employee Address Cannot be Blank";
        }
        if(is_blank($this->employee_phone)) {
            $this->errors[] = "Employee Phone Number Cannot be Blank";
        }elseif (!has_length($this->employee_phone, array('min' => 11, 'max' => 11))) {
            $this->errors[] = "Phone Number Must be 11 Digit";
        }elseif (!preg_match('/[0-9]/', $this->employee_phone)) {
            $this->errors[] = "Phone Number Must Be in number";
        }
        if(is_blank($this->salary_amount)) {
            $this->errors[] = "Employee Salary Cannot be Blank";
        }
        if(is_blank($this->given_date)) {
            $this->errors[] = "Salary Given Date Cannot be Blank";
        }
        return $this->errors;
    }






}

?>
