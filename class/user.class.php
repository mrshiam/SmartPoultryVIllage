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

    Public function validate() {
        $this->errors = [];

        if(is_blank($this->farm_name)) {
            $this->errors[] = "Farm name cannot be blank.";
        } elseif (!has_length($this->farm_name, array('min' => 2, 'max' => 255))) {
            $this->errors[] = "Farm name name must be between 2 and 255 characters.";
        }

        if(is_blank($this->full_name)) {
            $this->errors[] = "Full name cannot be blank.";
        } elseif (!has_length($this->full_name, array('min' => 3, 'max' => 255))) {
            $this->errors[] = "Full name must be between 2 and 255 characters.";
        }

        if(is_blank($this->email_address)) {
            $this->errors[] = "Email cannot be blank.";
        } elseif (!has_valid_email_format($this->email_address)) {
            $this->errors[] = "Email must be a valid format.";
        }elseif (!has_unique_email($this->email_address, $this->id ?? 0)) {
            $this->errors[] = "Email is Already in Use. Try another.";
        }

        if(is_blank($this->phone_number)) {
            $this->errors[] = "Phone Number cannot be blank.";
        } elseif (!has_length($this->phone_number, array('min' => 11, 'max' => 11))) {
            $this->errors[] = "Phone Number Must be 11 Digit";
        }elseif (!preg_match('/[0-9]/', $this->phone_number)) {
            $this->errors[] = "Phone Number Must Be in number";
        }


        if($this->password_required) {
            if(is_blank($this->password)) {
                $this->errors[] = "Password cannot be blank.";
            } elseif (!has_length($this->password, array('min' => 6))) {
                $this->errors[] = "Password must contain 6 or more characters";
            } elseif (!preg_match('/[A-Z]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 uppercase letter";
            } elseif (!preg_match('/[a-z]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 lowercase letter";
            } elseif (!preg_match('/[0-9]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 number";
            } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 symbol";
            }

            if(is_blank($this->confirm_password)) {
                $this->errors[] = "Confirm password cannot be blank.";
            } elseif ($this->password !== $this->confirm_password) {
                $this->errors[] = "Password and confirm password must match.";
            }
        }

        return $this->errors;
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