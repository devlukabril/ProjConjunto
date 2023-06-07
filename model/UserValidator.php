<?php

require '../app/conection.php';

class UserValidator extends Database {

    public function __construct($db) {
        $this->db = $db;
        parent::__construct();
    }

    public function validateFormData($name, $lastname, $email, $password) {
        if (empty($name) || empty($lastname) || empty($email) || empty($password)) {
            return "Por favor, preencha todos os campos.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email inválido.";
        }

        return true; // A validação passou
    }

    public function insertUser($name, $lastname, $email, $password) {
        $inserir = "INSERT INTO users (name, lastname, email, password) VALUES (?, ?, ?, ?)";

        $stmt = $this->db->prepare($inserir);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $lastname);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $password);
        $stmt->execute();

        if ($stmt) {
            return true; // Inserção bem-sucedida
        } else {
            return "Falha ao inserir no banco de dados.";
        }
    }
}
?>







