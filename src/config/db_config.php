<?php
/**
 * Future guardians initiative 
 *
 * @see       https://github.com/jalikoa/fgi/ The future guardians repository
 * @author    Calvince Owino Jalikoa (Kenya) <d34calvo@gmail.com>
 * @copyright 2024 - 2025 Calvince Owino CEO Jalsoft
 * @license   Thi programe is written for the specific needs of future guardians initiative and no part can be taken away without prior permissions
 * CEO JalSoft Calvince Owino
 * @see contact at +254799311413
 */
$Hname = "localhost";
$Uname = "root";
$Upass = "";
$Db = "FutureGuardiansInitiative";
$conn = new mysqli($Hname,$Uname,$Upass,$Db);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
    exit();
}
