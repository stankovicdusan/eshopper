<?php

require_once (__DIR__."/../phpmailer/contactMail.php");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['message'];

    $reName = "/^[A-Z][a-z]{1,}(\s[A-Z][a-z]{1,})*$/";
    $reSubject = "/^[A-z]{2,}(\s[A-z]{3,})*$/";
    $reMessage = "/^[A-z]{2,}(\W\D\d\s)*/";

    $errors = [];

    if(!preg_match($reName, $name) || empty($name)){
        array_push($errors, "Error with name.");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)){
        array_push($errors, "Email is not set correctly.");
    }

    if(!preg_match($reSubject, $subject) || empty($subject)){
        array_push($errors, "Subject is not set correctly.");
    }

    if(!preg_match($reMessage, $msg) || empty($msg)){
        array_push($errors, "Message is not set correctly.");
    }

    if(count($errors) == 0){
        $result = sendContactMail($email, $msg);
    }
}