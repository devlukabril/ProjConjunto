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

  public function getId() {
      return $this->id;
  }

  public function setId($id) {
      $this->id = $id;
  }

  public function getName() {
      return $this->name;
  }

  public function setName($name) {
      $this->name = $name;
  }

  public function getLastname() {
      return $this->lastname;
  }

  public function setLastname($lastname) {
      $this->lastname = $lastname;
  }

  public function getEmail() {
      return $this->email;
  }

  public function setEmail($email) {
      $this->email = $email;
  }

  public function getPassword() {
      return $this->password;
  }

  public function setPassword($password) {
      $this->password = $this->generatePassword($password);
  }

  public function getToken() {
      return $this->token;
  }

  public function setToken($token) {
      $this->token = $token;
  }

  public function generateToken() {
      return bin2hex(random_bytes(50));
  }
  
  public function generatePassword($password) {
      return password_hash($password, PASSWORD_DEFAULT);
  }

  public function validate() {
    // Verifica se o email é válido
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    
    
    // Verifica se o nome e sobrenome possuem apenas letras
    if (!ctype_alpha($this->name) || !ctype_alpha($this->lastname)) {
        return false;
    }

    return true; // retorna true se a validação passar
}

  public function save() {
     // Prepara a query INSERT com prepared statements
    $stmt = $this->db->prepare('INSERT INTO users (name, lastname, email, password, token) VALUES (?, ?, ?, ?, ?)');

    // Sanitiza os dados antes de inseri-los no banco de dados
    $name = filter_var($this->name, FILTER_SANITIZE_STRING);
    $lastname = filter_var($this->lastname, FILTER_SANITIZE_STRING);
    $email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
    $password = filter_var($this->password, FILTER_SANITIZE_STRING);
    $token = filter_var($this->token, FILTER_SANITIZE_STRING);

    // Executa a query com os valores dos atributos da classe
    $stmt->execute([$name, $lastname, $email, $password, $token]);

    // Retorna true se o salvamento for bem-sucedido e false caso contrário
    return true;
   }
}



?>