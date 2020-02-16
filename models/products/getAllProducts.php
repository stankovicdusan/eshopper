<?php

header('Content-Type: application/json');

require_once (__DIR__ . "/../../config/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $products = executeQuery("SELECT * FROM proizvod p INNER JOIN proizvod_info pi ON p.id_proizvod=pi.proizvod_id");
        echo json_encode($products);
    } catch (PDOException $e) {
        require_once (__DIR__. "/../files/functions.php");
        catchErrors($e->getMessage());
        http_response_code(500);
    }
} else {
    http_response_code(400);
}