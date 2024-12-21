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
    require_once "../src/models/profile_model.php";
    require_once "../src/helpers/sanitation.php";
    require_once "../src/config/db_config.php";
    require_once "../src/middlewares/auth_middleware.php";
    use jalikoa\FGIprogramme\Auth;
    use jalikoa\FGIprogramme\profile;
if (isset($_POST["update_profile"])){
    $sessid = sanitize($_POST["sessid"]);
    $firstname = sanitize($_POST["firstname"]);
    $lastname = sanitize($_POST["lastname"]);
    $username = sanitize($_POST["username"]);
    $email = sanitize($_POST["email"]);
    $image = $_FILES["prof-pic"];
    $fblink = sanitize($_POST["fblink"]);
    $country = sanitize($_POST["country"]);
    $bio = sanitize($_POST["bio"]);
    $id = sanitize($_POST["user_id"]);
    $auth = new Auth();
    $userid = "";
    if (isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $profile = new profile();
    if($auth->check_logged_in($sessid)){
        if($auth->auth_acc_verified($userid,$conn)){
            if($profile->setCred($firstname,$lastname,$username,$email,$image,$fblink,$phone,$country,$bio)){
                if ($profile->edit_profile($conn,$userid)){
                    echo json_encode(["success" => true,"message" => "Profile succesfully updated"]);
                }
            } else {
                echo json_encode(["success" => false,"message" => "Please ensure that all the fields are filled."]);
            }
        } else {
            echo json_encode(["success" => false,"message" => "Please verify your account first to continue!"]);
        }
    } else {
        echo json_encode(["success" => false,"message" => "Please login first to continue!"]);
    }
} 
if (isset($_POST["view_profile"])){
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if (isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    if($auth->check_logged_in($sessid)){
        if($auth->auth_acc_verified($userid,$conn)){
            if($profile->fetch_user_particulars($conn,$userid)){
                echo json_encode(["success" => true,"message" => "Records succesfully fetched","cred" => $profile->getCred]);
            } else {
                echo json_encode(["success" => false,"message" => "Your profile records do not exist"]);
            }
        } else {
            echo json_encode(["success" => false,"message" => "Please verify your account first to continue!"]);
        }
    } else {
        echo json_encode(["success" => false,"message" => "Please login first to continue!"]);
    }  
}
if(isset($_POST["deleteprofile"])){
    $password = sanitize($_POST["userpassword"]);
    $userid = "";
    if (isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $profile = new profile();
    if($profile->check_u_exists($conn,$userid)){
        if($profile->verify_u_password($password)){
            if($profile->delete_account($conn,$userid)){
                echo json_encode(["success" => true,"message" => "Account deleted it is sad to see you leaving please join us again"]);
            } else {
                echo json_encode(["success" => false,"message" => "could not delete account try again later please!"]);
            }
        } else {
            echo json_encode(["success" => false,"message" => "Action not completed! Incorrect password"]);
        }
    } else {
        echo json_encode(["success" => false,"message" => "User does not exist"]);
    }

}
if(isset($_POST["changepass"])){
    $sessid = sanitize($_POST["sessid"]);
    $new_pass = sanitize($_POST["newpass"]);
    $ini_pass = sanitize($_POST["initialpass"]);
    $userid = "";
    if (isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $profile = new profile();
    $auth = new Auth();
    if ($auth->check_logged_in($sessid)){
        if ($auth->auth_acc_verified($userid,$conn)){
            if($profile->verify_u_password($ini_pass)){
                if($profile->change_password($conn,$userid,$new_pass)){
                    echo json_encode(["success" => true,"message" => "You have succesfully changed your password"]);
                } else {
                    echo json_encode(["success" => false,"message" => "An uncaught exception occurred while updating password try again later"]);
                }
            } else {
                echo json_encode(["success" => false,"message" => "Action not completed! Incorrect password"]);
            }
        } else {
            echo json_encode(["success" => false,"message" => "Verify your account first please"]);
        }
    } else {
        echo json_encode(["success" => false,"message" => "Ensure you are logged in please"]);
    }
}