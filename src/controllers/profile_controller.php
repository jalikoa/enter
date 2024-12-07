<?php

$profile = new profile();
if (isset($_POST["delete_profile"])){
    $del = $profile->delete_user($conn,sanitize($_POST["user_id"]));
    if ($del){
        echo json_encode(["success" => true,"message" => "It is sad to see you leaving please you can consider rejoining us again."]);
    } else {
        echo json_encode(["success" => false,"message" => "Sorry error occurred while deleting account"]);
    }
}
if (isset($_POST["update_profile"])){
    $firstname = sanitize($_POST["firstname"]);
    $lastname = sanitize($_POST["lastname"]);
    $username = sanitize($_POST["username"]);
    $email = sanitize($_POST["email"]);
    $image = $_FILES["prof-pic"];
    $fblink = sanitize($_POST["fblink"]);
    $country = sanitize($_POST["country"]);
    $bio = sanitize($_POST["bio"]);
    $id = sanitize($_POST["user_id"]);
    $profile->setCred($firstname,$lastname,$username,$email,$image,$fblink,$phone,$country,$bio);
    $profile->edit_profile($conn,$id);
} 
if (isset($_POST["view_profile"])){
    $profile->fetch_user_particulars($conn,$_POST["user_id"]);
}