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
require_once "../src/models/contactus_model.php";
require_once "../src/helpers/sanitation.php";
require_once "../src/config/db_config.php";
use jalikoa\FGIprogramme\contact_us;
if(isset($_POST["contactus"])){
    $email = sanitize($_POST["useremail"]);
    $text = sanitize($_POST["usertext"]);
    $country = sanitize($_POST["usercountry"]);
    $name = sanitize($_POST["username"]);
    $contact_us = new contact_us();
if($contact_us->setCred($email,$text,$country,$name)){
    if($contact_us->sendContent($conn)){
        echo json_encode(["success" => true,"message" => "Response sent.We will act soon.Thank you"]);
    } else {
        echo json_encode(["success" => false,"message" => "Not sent.Try again later"]);
    }
} else {
    echo json_encode(["success" => false,"message" => "All fields are required."]);
}
}
