<?php

require_once '../app/conection.php';
require_once '../model/User.php';
class UserDao Implements UserDaoInterface{

    private $db;

    public function __construct() {
        $database = new Database($this->db);
        $this->db = $database->getDb();
    }

    public function create(User $user){
        $sql = $this->db->prepare("INSERT INTO users (name, lastname, email, password, token) VALUES (:name, :lastname, :email, :password, :token)");
        $sql->bindValue(':name', $user->getName());
        $sql->bindValue(':lastname', $user->getLastname());
        $sql->bindValue(':email', $user->getEmail());
        $sql->bindValue(':password', $user->getPassword());
        $sql->bindValue(':token', $user->getToken());
        $sql->execute();

        $user->setId($this->db->lastInsertId());
        return $user;

    }

    public function update(User $user){

    }

    public function showUser(){

    }

    public function verifyToken($protected = false){

    }

    public function autenticateUser($email, $password){
        $sql = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        $user = $sql->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            
            if (password_verify($password, $user['password'])) {
                
                return $user;
            }
        }
        return false;
    }

    public function findByEmail($email){
        $sql = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);

    }

    public function findById($id){

    }

    public function findByToken($token){

    }

    public function changePassword(User $user){

    }
}