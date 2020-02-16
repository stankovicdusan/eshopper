<?php

function getAllFromCart(){
    global $conn;
    return $conn->query("SELECT * FROM korpa")->fetchAll();
}

function rowNumbersCartWithId($id_u, $id_p){
    global $conn;
    $query = $conn->prepare("SELECT * FROM korpa WHERE korisnik_id = ? AND proizvod_id = ?");
    $query->execute([$id_u, $id_p]);
    $stmt = $query->rowCount();
    return $stmt;
}

function getOneProductById($id_u, $id_p){
    global $conn;
    $query = $conn->prepare("SELECT * FROM korpa WHERE korisnik_id = ? AND proizvod_id = ?");
    $query->execute([$id_u, $id_p]);
    $one = $query->fetch();
    return $one;
}

function getAllWithId($id_u, $id_p){
    global $conn;
    $query = $conn->prepare("SELECT * FROM korisnik k INNER JOIN korpa ko ON k.id_korisnik=ko.korisnik_id INNER JOIN proizvod p ON ko.proizvod_id=p.id_proizvod WHERE korisnik_id = ? AND proizvod_id = ?");
    $query->execute([$id_u, $id_p]);
    return $query->fetchAll();
}

function updateCartById($qu, $id_u, $id_p){
    global $conn;
    $update = $conn->prepare("UPDATE korpa SET kolicina = ? WHERE proizvod_id = ? AND korisnik_id = ?");
    $update->execute([$qu, $id_p, $id_u]);
}

function insertCart($id_u, $id_p){
    global $conn;
    $insert = $conn->prepare("INSERT INTO korpa VALUES(NULL, ?, ?, 1)");
    $insert->execute([$id_u, $id_p]);
}

function getProductsFromCartById($id){
    global $conn;
    $query = $conn->prepare("SELECT * FROM korisnik k INNER JOIN korpa ko ON k.id_korisnik=ko.korisnik_id INNER JOIN proizvod p ON ko.proizvod_id=p.id_proizvod WHERE korisnik_id = ?");
    $query->execute([$id]);
    return $query->fetchAll();
}

function deleteProductFromCart($id){
    global $conn;
    $query = $conn->prepare("DELETE FROM korpa WHERE id_korpa = ?");
    return $query->execute([$id]);
}