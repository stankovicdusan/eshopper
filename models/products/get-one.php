<?php

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    require_once(__DIR__ . '/../../config/connection.php');
    require_once(__DIR__ . '/functions.php');

    $id = $_GET['id'];

    try {
        $products = getOneProduct($id);
        echo json_encode($products);
    } catch (PDOException $e) {
        require_once(__DIR__ . "/../files/functions.php");
        catchErrors($e->getMessage());
        http_response_code(500);
    }
} else {
    http_response_code(400);
}