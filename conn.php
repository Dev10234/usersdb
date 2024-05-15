<?php

$dsn = "mysql:host=localhost;";
$name = "root";
$pswd = "";

try {
    $pdo = new PDO($dsn, $name, $pswd);                                
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("CREATE DATABASE IF NOT EXISTS db_login");
    $stmt->execute();
    $stmt = $pdo->prepare("USE db_login");
    $stmt->execute();
    $stmt = $pdo->prepare("CREATE TABLE IF NOT EXISTS  member (
        mem_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        firstname varchar(50) NOT NULL,
        lastname varchar(50) NOT NULL,
        username varchar(30) NOT NULL,
        password varchar(40) NOT NULL,
        confirmPassword varchar(40) NOT NULL
    )") ; 
    $stmt->execute();
}

catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>