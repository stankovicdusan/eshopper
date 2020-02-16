<?php

function productsByCategory($id){
    global $conn;
    $query = $conn->prepare('SELECT * FROM proizvod p INNER JOIN proizvod_info pi ON p.id_proizvod=pi.proizvod_id WHERE marka_id = :id ORDER BY cena');
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetchAll();
}

function filterByPriceRange($priceRange){
    global $conn;

    if(!empty($priceRange)){
        $priceRangeArr = explode(',', $priceRange);
        $sql = "SELECT * FROM proizvod p INNER JOIN proizvod_info pi ON p.id_proizvod=pi.proizvod_id WHERE cena BETWEEN '".$priceRangeArr[0]."' AND '".$priceRangeArr[1]."'ORDER BY cena";
    }else{
        $sql = "SELECT * FROM proizvod p INNER JOIN proizvod_info pi ON p.id_proizvod=pi.proizvod_id ORDER BY cena";
    }

    return $conn->query($sql)->fetchAll();
}

function allProductsWithCat(){
    global $conn;
    return $conn->query('SELECT * FROM proizvod p INNER JOIN marka m ON p.marka_id=m.id_marka')->fetchAll();
}

function insertProducts($src, $alt, $nameProd, $price, $id){
    global $conn;
    $query = $conn->prepare("INSERT INTO proizvod VALUES (NULL, :src, :alt, :nameProd, :price, (SELECT id_marka FROM marka WHERE id_marka = :id))");
    $query->bindParam(":src", $src);
    $query->bindParam(":alt", $alt);
    $query->bindParam(":nameProd", $nameProd);
    $query->bindParam(":price", $price);
    $query->bindParam(":id", $id);

    return $query->execute();
}

function getOneProduct($id){
    global $conn;
    $query = $conn->prepare("SELECT * FROM proizvod p INNER JOIN marka m ON p.marka_id=m.id_marka WHERE id_proizvod = ?");
    $query->execute([$id]);
    return $query->fetch();
}

function updateProducts($id, $src, $alt, $nameProd, $price, $cat){
    global $conn;
    $query = $conn->prepare("UPDATE proizvod SET src = :src, alt = :alt, nazivProizvod = :nameProd, cena = :price, marka_id = :id WHERE id_proizvod = :idP");
    $query->bindParam(":idP", $id);
    $query->bindParam(":src", $src);
    $query->bindParam(":alt", $alt);
    $query->bindParam(":nameProd", $nameProd);
    $query->bindParam(":price", $price);
    $query->bindParam(":id", $cat);

    return $query->execute();
}

function deleteProduct($id){
    global $conn;
    $query = $conn->prepare("DELETE FROM proizvod WHERE id_proizvod = ?");
    $query->execute([$id]);
    return $query;
}

function getProductInfoById($id){
    global $conn;
    $product_info = $conn->prepare("SELECT * FROM proizvod p INNER JOIN proizvod_info pi ON p.id_proizvod=pi.proizvod_id WHERE proizvod_id = ?");
    $product_info->execute([$id]);
    return $product_info->fetch();
}