<?php

//session_start();
header("Content-Type: application/json");

require_once (__DIR__ . "/../../config/connection.php");
require_once (__DIR__. "/../products/functions.php");

if(isset($_POST['price_range'])){
    $priceRange  = $_POST['price_range'];
    try {
        $filteredProducts = filterByPriceRange($priceRange);
        echo json_encode($filteredProducts);
    }catch (PDOException $e) {
        require_once (__DIR__ . "/../files/functions.php");
        catchErrors($e->getMessage());
        http_response_code(500);
    }
} else {
    http_response_code(400);
}