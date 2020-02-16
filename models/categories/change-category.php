<?php

header("Content-Type: application/json");

require_once (__DIR__. '/../../config/connection.php');
require_once (__DIR__.'/functions.php');

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['href'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $link = $_POST['href'];

    try{
        $cat = updateCatById($id, $name, $link);
        http_response_code(204);
    }catch(PDOException $e){
        require_once (__DIR__ . "/../files/functions.php");
        catchErrors($e->getMessage());
        http_response_code(500);
    }
}else{
    http_response_code(400);
}