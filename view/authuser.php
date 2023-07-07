<?php
session_start();
require_once '../dao/UserDao.php';

$UserDao = new UserDao();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $UserDao->autenticateUser($email, $password);

    if ($user) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('location: dashboard.php');
        exit;
    } else {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('location: login.php?error=invalid_credentials');
        exit;
    }
} else {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location: ../error.html');
    exit;
}



