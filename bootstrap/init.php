<?php

session_start();
include "constants.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "vendor/autoload.php";
include BASE_PATH . "libs/helpers.php";


$dsn = "mysql:dbname={$database_config->db};host={$database_config->host}";
$dus = $database_config->user;
$dps = $database_config->pass;

try{
    $PDO = new PDO($dsn , $dus , $dps);
}

catch(PDOException $e){
    diePage ("your connetction is unsucssefuly" . $e );
    die();
}




include BASE_PATH . "libs/lib-auth.php";
include BASE_PATH . "libs/lib-tasks.php";

// echo "connection to database is sucssefuly";
