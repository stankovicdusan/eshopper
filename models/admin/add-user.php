<?php


require_once (__DIR__. '/../../config/connection.php');
require_once (__DIR__.'/functions.php');

if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    try {
        $user = addUser($name, $username, $email, $password, $role);
        http_response_code(201);
    }catch(PDOException $e){
        require_once (__DIR__ . "/../files/functions.php");
        catchErrors($e->getMessage());
        http_response_code(500);
    }
}else{
    http_response_code(400);
}
