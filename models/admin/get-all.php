<?php

header("Content-Type: application/json");

require_once (__DIR__."/../../config/connection.php");
require_once (__DIR__."/../users/functions.php");

$users = getUserByRole();

echo json_encode($users);
