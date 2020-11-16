<?php
class User extends Database {
static protected $table_name = "user";
static protected $db_columns = ['id', 'farm_name', 'full_name', 'email_address', 'phone_number', 'hashed_password'];

public $id;
public $farm_name;
public $full_name;
public $email_address;
public $phone_number;
public $password;
public $confirm_password;
protected $hashed_password;

public function __construct($args=[]){
    $this->farm_name = $args['farm_name'] ?? '';
    $this->full_name = $args['full_name'] ?? '';
    $this->email_address = $args['email_address'] ?? '';
    $this->phone_number = $args['phone_number'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';

}

    protected function set_hashed_password() {
        $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function verify_password($password) {
        return password_verify($password, $this->hashed_password);
    }

    protected function create() {
        $this->set_hashed_password();
        return parent::create();
    }

    protected function update() {
        if($this->password != '') {
            $this->set_hashed_password();
            // validate password
        } else {
            // password not being updated, skip hashing and validation
            $this->password_required = false;
        }
        return parent::update();
    }








}



?>