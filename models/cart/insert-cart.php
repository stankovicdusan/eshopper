<?php

header("Content-Type: application/json");

require_once (__DIR__ . "/../../config/connection.php");
require_once (__DIR__ . "/functions.php");

if(isset($_POST['id_u'])){
    $id_user = $_POST['id_u'];
    $id_prod = $_POST['id_p'];

    try{
        $row = rowNumbersCartWithId($id_user, $id_prod);

        if($row == 1){
            $one = getOneProductById($id_user, $id_prod);
            $quant = $one->kolicina;
            $quant++;

            $update = updateCartById($quant, $id_user, $id_prod);
            http_response_code(200);
            echo json_encode("Product added to cart");
        }else{
            $product = insertCart($id_user, $id_prod);
            http_response_code(200);
            echo json_encode("<h2>Product added to cart</h2>");
        }
    }catch(PDOException $e){
        require_once (__DIR__ . "/../files/functions.php");
        catchErrors($e->getMessage());
        http_response_code(500);
    }
}else{
    http_response_code(400);
}

