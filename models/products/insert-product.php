<?php

require_once (__DIR__. '/../../config/connection.php');
require_once (__DIR__.'/functions.php');

if(isset($_POST['btnSave'])){
    $image = $_FILES['imageProd']['name'];
    $alt = $_POST['altProd'];
    $name = $_POST['nameProd'];
    $price = $_POST['priceProd'];
    $category = $_POST['categoryOption'];

    $fullName = "assets/images/" . $image;

    try{
        $products = insertProducts($fullName, $alt, $name, $price,$category);

        if($products){
            move_uploaded_file($_FILES['imageProd']['tmp_name'], "../../assets/images/".$image);
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