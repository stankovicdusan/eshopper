<?php

if(isset($_POST['registerButton'])){
    $errors = [];

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $reName = "/^[A-Z]{1}[a-z]{2,20}$/";
    $reUsername = "/^([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*$/";
    $rePassword = "/([\w\W\D\d]){7,}/";

    if(!preg_match($reName, $name) || empty($name)){
        array_push($errors, "Error with name.");
    }

    if(!preg_match($reUsername, $username) || empty($username)){
        array_push($errors, "Error with username.");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)){
        array_push($errors, "Email is not set correctly.");
    }

    if(!preg_match($rePassword, $password) || empty($password)){
        array_push($errors, "Password is not set correctly.");
    }

    if(count($errors) == 0){
        require_once (__DIR__ . "/../../config/connection.php");
        require_once (__DIR__ . "/functions.php");

        try{
            $userRegistration = registerUser($name, $username, $email, $password);
            echo "<script type='text/javascript'> window.location.href = '../../index.php?page=login' </script>";
        }
        catch(PDOException $e){
            require_once (__DIR__ . "/../files/functions.php");
            catchErrors($e->getMessage());
            http_response_code(500);
        }

    }
}