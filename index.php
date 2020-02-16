<?php
ob_start();
session_start();

require_once "views/fixed/head.php";
require_once "views/fixed/header.php";

if(!isset($_GET['page'])){
    require_once "views/home.php";
}else{
    switch($_GET['page']){
        case 'home':
            require_once "views/home.php";
            break;
        case 'login':
            require_once "views/login.php";
            break;
        case 'contact-us':
            require_once "views/contact-us.php";
            break;
        case 'product-info':
            require_once "views/product-info.php";
            break;
        case 'cart':
            require_once "views/cart.php";
            break;
        case 'admin':
            require_once "views/admin.php";
            break;
        case 'delete-cart':
            require_once "models/cart/delete-cart.php";
            break;
        default;
            require_once 'views/home.php';
            break;
    }
}

require_once "views/fixed/footer.php";

?>