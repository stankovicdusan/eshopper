<?php
session_start();

if(isset($_POST['loginBtn'])){
    require_once (__DIR__. "/../../config/connection.php");
    require_once (__DIR__. "/functions.php");

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $user = getUser($email, $password);

    $_SESSION['user'] = $user;

    if($_SESSION['user']->uloga_id==1){
        header("Location: ../../index.php");
    }elseif($_SESSION['user']->uloga_id==2){
        $admin = $_SESSION['user']->uloga_id==2;
        $_SESSION['admin'] = $admin;
        header("Location: ../../index.php?page=admin");
    }else{

    }
}