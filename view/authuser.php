<?php
session_start();
require_once '../dao/UserDao.php';

$UserDao = new UserDao();

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location:../error.html');
        exit;
    }
    if ($UserDao->autenticateUser($email, $password)) {
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
}else{
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location:../error.html');
    exit;
}



