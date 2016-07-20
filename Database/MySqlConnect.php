<?php

$servername = "localhost";
$username = "mariact_root";
$password = "^8pA,Wcd7Mm6";
$dbname = "mariact_BookeLook";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
