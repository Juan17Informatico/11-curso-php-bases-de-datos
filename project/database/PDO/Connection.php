<?php 

$server = "localhost"; 
$database = "finanzas_personales"; 
$username = "root"; 
$password = "";
$driver = "mysql:host=$server;dbname=$database"; 

$connection = new PDO($driver, $username, $password); 

$setnames = $connection->prepare("SET NAMES 'utf8'"); 
$setnames->execute();

var_dump($setnames);