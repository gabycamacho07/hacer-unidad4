<?php

$DBuser = 'root';
$DBpass = $_ENV['MYSQL_ROOT_PASSWORD'];


try{
    $database = "mysql:host=database:3306;dbname=docker";
    $bd = new PDO($database, $DBuser, $DBpass);
     
} catch(PDOException $e) {
    echo "Error: Unable to connect to MySQL. Error:\n $e";
}

$pdo = null;
