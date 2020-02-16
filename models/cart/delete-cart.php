<?php

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once (__DIR__ . "/../../config/connection.php");
    require_once (__DIR__ . "/functions.php");

    try{
        deleteProductFromCart($id);

        header("Location: index.php?page=cart");
    }catch(PDOException $e){
        require_once (__DIR__ . "/../files/functions.php");
        catchErrors($e->getMessage());
        http_response_code(500);
    }
}else{
    http_response_code(400);
}





