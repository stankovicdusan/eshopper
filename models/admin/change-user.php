<?php

header("Content-Type: application/json");

require_once (__DIR__. '/../../config/connection.php');
require_once (__DIR__.'/functions.php');

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    try{
        $user = updateUserById($id, $name, $username, $email, $password, $role);
        http_response_code(204);
    }catch(PDOException $e){
        require_once (__DIR__ . "/../files/functions.php");
        catchErrors($e->getMessage());
        http_response_code(500);
    }
}else{
    http_response_code(400);
}