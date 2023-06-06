<?php 

require_once ("../app/conection.php");
class User extends Database {
    protected $id;
    protected $name;
    protected $lastname;
    protected $email;
    protected $password;
    protected $token;

    public function __construct($name, $lastname, $email, $password, $token = null, $id = null) {
        parent::__construct();
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->token = $token ? $token : $this->generateToken();
        $this->id = $id;
    }
}


?>