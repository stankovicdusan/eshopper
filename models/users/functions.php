<?php

function getUser($email, $password){
    global $conn;
    $query = $conn->prepare("SELECT * FROM korisnik WHERE email = :email AND password = :password");
    $query->bindParam(":email", $email);
    $query->bindParam(":password", $password);

    $prepare = $query->execute();
    if($prepare){
        if($query->rowCount()==1){
            return $query->fetch();
        }
    }
}

function registerUser($name, $username, $email, $password){
    global $conn;
    $query = $conn->prepare("INSERT INTO korisnik VALUES ('', ?, ?, ?, ?, 1)");
    return $query->execute([$name, $username, $email, md5($password)]);
}

function getUserByRole(){
    global $conn;
    $query = $conn->query("SELECT * FROM korisnik k INNER JOIN uloga u ON k.uloga_id=u.id_uloga");
    return $query->fetchAll();
}

function getUserById($id){
    global $conn;
    $query = $conn->prepare("SELECT * FROM korisnik WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch();
}

function getRole(){
    global $conn;
    return $conn->query("SELECT * FROM uloga")->fetchAll();
}