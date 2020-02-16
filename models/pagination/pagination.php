<?php

header("Content-Type: application/json");

require_once (__DIR__ . "/../../config/connection.php");
require_once (__DIR__ . "/functions.php");

$perPage = 5;
if (isset($_POST["page"])) {
    $page  = $_POST["page"];

    $startFrom = ($page-1) * $perPage;

    $pagination = getPagination($startFrom, $perPage);

    echo json_encode($pagination);
} else {
    $page=1;
}