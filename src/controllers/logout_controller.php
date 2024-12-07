<?php
require_once "../src/models/logout_model.php";
$logout = new logout();
if ($logout->logout_user()){
    echo json_encode(["success" => true,"message" => "Succefully logged out"]);
} else {
    echo json_encode(["logout unsuccesfull"]);
}