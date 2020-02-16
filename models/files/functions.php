<?php

function catchErrors($error){
    $file = @ fopen (ERRORS, "a");

    if($file){
        $data = $error . "\t\n";
        fwrite($file, $data);
        fclose($file);
    }
}