<?php

function deleteUser($id){
    global $conn;
    $query = $conn->prepare("DELETE FROM korisnik WHERE id_korisnik = ?");
    $query->execute([$id]);
    return $query;
}

function getOneUser($id){
    global $conn;
    $query = $conn->prepare("SELECT * FROM korisnik k INNER JOIN uloga u ON k.uloga_id=u.id_uloga WHERE id_korisnik = ?");
    $query->execute([$id]);
    if($query){
        $user = $query->fetch();
    }
    return $user;
}

function updateUserById($id, $name, $username, $email, $password, $role){
    global $conn;
    $password = md5($password);
    $query = $conn->prepare("UPDATE korisnik SET ime = :ime, username = :username, email = :email, password = :pass, uloga_id = :u_id WHERE id_korisnik = :id");
    $query->bindParam(":id", $id);
    $query->bindParam(":ime", $name);
    $query->bindParam(":username", $username);
    $query->bindParam(":email", $email);
    $query->bindParam(":pass", $password);
    $query->bindParam(":u_id", $role);

    return $query->execute();
}

function addUser($name, $username, $email, $password, $role){
    global $conn;
    $query = $conn->prepare("INSERT INTO korisnik VALUES (NULL, :ime, :username, :email , :password, (SELECT id_uloga FROM uloga WHERE id_uloga = :id))");
    $query->bindParam(":ime", $name);
    $query->bindParam(":username", $username);
    $query->bindParam(":email", $email);
    $query->bindParam(":password", $password);
    $query->bindParam(":id", $role);

    return $query->execute();
}
