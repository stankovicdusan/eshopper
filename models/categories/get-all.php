<?php

header("Content-Type: application/json");

require_once (__DIR__."/../../config/connection.php");
require_once (__DIR__."/functions.php");

$categories = getCategories();

echo json_encode($categories);