<?php

function getTotalProducts(){
    global $conn;
    return $conn->query("SELECT * FROM proizvod")->rowCount();
}

function getPagination($startFrom, $perPage){
    global $conn;
    $query = $conn->query("SELECT * FROM proizvod p INNER JOIN marka m ON p.marka_id=m.id_marka LIMIT ". $startFrom . ",". $perPage);
    return $query->fetchAll();
}