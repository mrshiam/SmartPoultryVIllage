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
public $hashed_password;
public $password_required = true;

public function __construct($args=[]){
    $this->farm_name = $args['farm_name'] ?? '';
    $this->full_name = $args['full_name'] ?? '';
    $this->email_address = $args['email_address'] ?? '';
    $this->phone_number = $args['phone_number'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';

}

    public function set_hashed_password() {
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


    static public function find_by_email($email_address) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE email_address='" . self::$database->escape_string($email_address) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }
    static public function find_by_full_name($full_name) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE full_name='" . self::$database->escape_string($full_name) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }
    static public function find_by_farm_name($farm_name) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE farm_name='" . self::$database->escape_string($farm_name) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }








}



?>