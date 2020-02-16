<?php


require_once (__DIR__. '/../../config/connection.php');
require_once (__DIR__.'/functions.php');

if(isset($_POST['name']) && isset($_POST['href'])){

    $name = $_POST['name'];
    $link = $_POST['href'];

    try {
        $cat = addCat($name, $link);
        http_response_code(201);
    }catch(PDOException $e){
        require_once (__DIR__ . "/../files/functions.php");
        catchErrors($e->getMessage());
        http_response_code(500);
    }
}else{
    http_response_code(400);
}