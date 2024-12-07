<?php

$Hname = "localhost";
$Uname = "root";
$Upass = "";
$Db = "FutureGuardiansInitiative";
$conn = new mysqli($Hname,$Uname,$Upass,$Db);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
    exit();
}