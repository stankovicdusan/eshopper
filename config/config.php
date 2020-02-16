<?php

define("BASE_URL", "http://localhost/sajtovi/php2_sajt1");
define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."/sajtovi/php2_sajt1");

define("ENV_FILE", ABSOLUTE_PATH."/config/.env");
define("LOG_FILE", ABSOLUTE_PATH."/data/log.txt");
define("ERRORS", ABSOLUTE_PATH."/data/errors.txt");
define("SEPARTOR", "&");

define("SERVER", env("SERVER"));
define("DBNAME", env("DBNAME"));
define("USERNAME", env("USERNAME"));
define("PASSWORD", env("PASSWORD"));

function env($name){
    $open = fopen(ENV_FILE, "r");
    $info = file(ENV_FILE);
    $value = "";
    foreach($info as $key=>$index){
        $config = explode("=", $index);
        if($config[0]==$name){
            $value = trim($config[1]);
        }
    }
    return $value;
}
