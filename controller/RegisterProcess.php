<?php

require_once './model/UserValidator.php';
require_once './model/User.php';

// Verifica se o formulário foi submetido

$data = [
    'name' => $_POST['name'] ?? '',
    'lastname' => $_POST['lastname'] ?? '',
    'email' => $_POST['email'] ?? '',
    'password' => $_POST['password'] ?? '',
    'repeatpassword' => $_POST['repeatpassword'] ?? '',
];

$validator = new UserValidator($data);
$errors = $validator->validate();

    if (count($errors) > 0) {
        // Exibe os erros para o usuário
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    } else {

    }

// $user = new User($data['name'], $data['lastname'], $data['email'], $data['password']);
// $result = $user->save();

//     if ($result) {
//         header('Location: http://localhost/portalobjetivo/app/view/index.php');
//     } else {
//         // Exibe uma mensagem de erro.
//         echo 'Ocorreu um erro ao salvar o usuário.';
//     }
// }