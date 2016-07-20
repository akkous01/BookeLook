<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoominbooks";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
//Databese user phpmyadmin
// mariact_root
// ^8pA,Wcd7Mm6

// Database directory - assets -
// mariact_root
// {B[U{~7fW}=q