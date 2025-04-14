<?php
$host = 'localhost';
$dbname = 'FutureGuardiansInitiative';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected to db successfully";
} catch (PDOException $e){
    echo "Connection failed: ".$e->getMessage();
}