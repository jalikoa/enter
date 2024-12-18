<?php
require_once "../src/models/typing_updater_model.php";
require_once "../src/helpers/sanitation.php";
require_once "../src/config/db_config.php";
require_once "../src/middlewares/auth_middleware.php";
use jalikoa\FGIprogramme\Auth;
use jalikoa\FGIprogramme\is_typing;
if (isset($_POST["updatetyping"])){
    $auth = new Auth();
    $sessid = sanitize($_POST["sessid"]);
    if ($auth->check_logged_in($sessid)){
        session_start();
        $userid = $_SESSION[$sessid];
        if($auth->auth_acc_verified($userid,$conn)){
            $update = new is_typing();
            if($update->start($userid,$dissid)){
                if($update->update($conn)){
                    echo json_encode(["success" => true,"message" => "typing status succesfully updated"]);
                } else{
                    echo json_encode(["success" => false,"message" => "Could not update whether you are typing or not"]);
                }
            } else {
                echo json_encode(["success" => false,"message" => "Could not update whether you are typing.Missing your id and discussion id"]);
            }
        } else {
            echo json_encode(["success" => false,"message" => "Sorry,Account not verified"]);
        }
    } else {
        echo json_encode(["success" => false,"message" => "Please login"]);
    }
} 