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
require_once "../src/models/online_updater_model.php";
require_once "../src/helpers/sanitation.php";
require_once "../src/config/db_config.php";
require_once "../src/middlewares/auth_middleware.php";
use jalikoa\FGIprogramme\isOnline;
use jalikoa\FGIprogramme\Auth;
if (isset($_POST["updateonline"])){
    $auth = new Auth();
    $sessid = sanitize($_POST["sessid"]);
    session_start();
    if ($auth->check_logged_in($sessid)){
        $sessid = sanitize($_POST["sessid"]);
        if(isset($sessid)){
            $userid = $_SESSION[$sessid];
        }
        if($auth->auth_acc_verified($userid,$conn)){
            $update = new isOnline();
            if($update->start($userid)){
                if($update->update_online($conn)){
                    echo json_encode(["success" => true,"message" => "Online status succesfully updated"]);
                } else{
                    echo json_encode(["success" => false,"message" => "Could not update when you are online"]);
                }
            } else {
                echo json_encode(["success" => false,"message" => "Could not update whether you are online.Missing your id"]);
            }
        } else {
            echo json_encode(["success" => false,"message" => "Sorry,Account not verified"]);
        }
    } else {
        echo json_encode(["success" => false,"message" => "Please login"]);
    }
} 