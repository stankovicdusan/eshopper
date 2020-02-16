<?php

function getCategories(){
    global $conn;
    return $conn->query("SELECT * FROM marka")->fetchAll();
}

function deleteCat($id){
    global $conn;
    $query = $conn->prepare("DELETE FROM marka WHERE id_marka = ?");
    $query->execute([$id]);
    return $query;
}

function getOneCategory($id){
    global $conn;
    $query = $conn->prepare("SELECT * FROM marka WHERE id_marka = ?");
    $query->execute([$id]);
    if($query){
        $cat = $query->fetch();
    }
    return $cat;
}

function updateCatById($id, $name, $link){
    global $conn;
    $query = $conn->prepare("UPDATE marka SET naziv = :naziv, putanja = :put  WHERE id_marka = :id");
    $query->bindParam(":id", $id);
    $query->bindParam(":naziv", $name);
    $query->bindParam(":put", $link);

    return $query->execute();
}

function addCat($name, $link){
    global $conn;
    $query = $conn->prepare("INSERT INTO marka VALUES (NULL, :naziv, :put)");
    $query->bindParam(":naziv", $name);
    $query->bindParam(":put", $link);

    return $query->execute();
}