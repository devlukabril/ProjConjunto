<?php
require_once '../model/UserValidator.php';

if (isset($_POST["caduser"])) {
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validar os campos do formulário
    $validationResult = validateForm($name, $lastname, $email, $password);
    if ($validationResult !== true) {
        echo $validationResult;
        return;
    }

    // Instanciar o UserValidator
    $userValidator = new UserValidator($db);

    // Inserir no banco de dados
    $insertionResult = $userValidator->insertUser($name, $lastname, $email, $password);
    if ($insertionResult === true) {
        echo "OK";
    } else {
        echo $insertionResult;
    }
}

function validateForm($name, $lastname, $email, $password) {
    if (empty($name) || empty($lastname) || empty($email) || empty($password)) {
        return "Por favor, preencha todos os campos.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email inválido.";
    }

    return true; // A validação passou
}
?>
