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
    require_once "../src/config/db_config.php";
    require_once "../src/models/login_model.php";
    require_once "../src/helpers/sanitation.php";
    use jalikoa\FGIprogramme\login;
    if(isset($_POST["login"])){
    $email = sanitize($_POST["useremail"]);
    $password = sanitize($_POST["userpassword"]);
    $user_login = new login();
        if($user_login->setCred($email,$password)){
    if($user_login->check_user_exist($conn)){
        if(!$user_login->check_blocked()){
        if($user_login->check_acc_verified()){
            if($user_login->check_password()){
                if($user_login->login_user()){
                    echo json_encode(["success" => true,"message" => "Login successfull","auth" => $user_login->getI(),"role"=>$user_login->getUserRole()]);
                } else {
                    echo json_encode(["success" => false,"message" => "There was a problem logging you in please try again later"]);
                }
            } else {
                echo json_encode(["success" => false,"message" => "Incorrect password for this account"]);
            }
        }else {
            echo json_encode(["success" => false,"message" => "Please verify your account","verify" => true]);
        }} else {
            echo json_encode(["success" => false,"message" => "Could not log you in.Seems like you are blocked by the admin !"]);
        }
    } else {
        echo json_encode(["success" => false,"message" => "No user exists with the credentials provided"]);
    }

} else {
    echo json_encode(["success" => false,"message" => "All fields are required"]);
}
    }