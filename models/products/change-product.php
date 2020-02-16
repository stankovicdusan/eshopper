<?php

require_once (__DIR__. '/../../config/connection.php');
require_once (__DIR__.'/functions.php');

if(isset($_POST['btnSaveChange'])){
    $id = $_POST['hdnChange'];
    $image = $_FILES['imageProdChange']['name'];
    $alt = $_POST['altProdChange'];
    $name = $_POST['nameProdChange'];
    $price = $_POST['priceProdChange'];
    $category = $_POST['categoryOptionChange'];

    $fullName = "assets/images/" . $image;

    try{
        $products = updateProducts($id, $fullName, $alt, $name, $price, $category);

        if($products){
            move_uploaded_file($_FILES['imageProdChange']['tmp_name'], "../../assets/images/".$image);
        }

        header("Location: ../../index.php?page=admin");
    }catch(PDOException $e){
        require_once (__DIR__ . "/../files/functions.php");
        catchErrors($e->getMessage());
        http_response_code(500);
    }
}else{
    http_response_code(400);
}

