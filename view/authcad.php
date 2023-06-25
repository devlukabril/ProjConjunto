<?php

require_once '../dao/UserDao.php';

$UserDao = new UserDao();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
$rptpassword = filter_input(INPUT_POST, 'rptpassword', FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $email && $password){
    
    if ($password === $rptpassword) {
        
        if ($UserDao->findByEmail($email) === false) {
            $newUser = new User();
            $newUser->setName($name);
            $newUser->setLastname($lastname);
            $newUser->setEmail($email);
            $newUser->setPassword($password);
            $newUser->generateToken();

            $UserDao->create($newUser);

            header('location:../index.html');
            exit;
            
        }else {
            header('location:cadastro.php');
            exit;
        }
    }else{
        header('location:cadastro.php');
        exit;
    }

}else{
    header('location:cadastro.php');
    exit;
}