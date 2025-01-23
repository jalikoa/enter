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
require_once "../src/models/messages_model.php";
require_once "../src/helpers/sanitation.php";
require_once "../src/config/db_config.php";
require_once "../src/middlewares/auth_middleware.php";
use jalikoa\FGIprogramme\message;
use jalikoa\FGIprogramme\Auth;
if(isset($_POST["sendmessage"])){
    $text = sanitize($_POST["message"]);
    $sessid = sanitize($_POST["sessid"]);
    session_start();
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        $message = new message();
        $sender = $userid;
        $messag = $text;
        $discussion = sanitize($_POST["discussionid"]);
        $type = sanitize($_POST["type"]);
        $reply_to = sanitize($_POST["reply_to"]);
        if ($message->Check_is_member($conn,$userid,$discussion)){
            if($message->setCred($sender,$messag,$discussion,$type,$reply_to)){
                if($message->check_is_blocked($conn,$userid,$discussion) == '0'){
                    if($message->send_message($conn)){
                        echo json_encode(["success"=>true,"message"=>"message sent"]);
                    } else {
                        echo json_encode(["success"=>false,"message"=>"Message not sent please try agian later please"]);
                    }
                } else {
                    echo json_encode(["success"=>false,"message"=>"Not sent you are blocked from sending messages"]);
                }
            } else {
                echo json_encode(["success"=>false,"message"=>"Message not sent please ensure that the required fields are filled please"]);
            }
        } else {
            echo json_encode(["success"=>false,"message"=>"Message not sent! You are not a member of this discussion!"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"You need to login to complete this action"]);
    }
}
if(isset($_POST["editmessage"])){
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $message = new message();
        $messid = sanitize($_POST["messageid"]);
        $new_sms = sanitize($_POST["newmessage"]);
        $discussion = sanitize($_POST["discussionid"]);
       if($message->Check_is_member($conn,$userid,$disid)){
        if($message->edit_message($conn,$new_sms,$messid)){
            echo json_encode(["success"=>true,"message"=>"Edited"]);
        } else {
            echo json_encode(["success"=>false,"message"=>"Edit failed try again later please"]);
        }
       } else {
        echo json_encode(["success"=>false,"message"=>"Could not complete action pleasae you are not a member of the discussion forum please"]);
       }
    } else {
        echo json_encode(["success"=>false,"message"=>"You need to login to complete this action"]);
    }
}
if(isset($_POST["deletemessage"])){
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $message = new message();
        $discussion = sanitize($_POST["discussionid"]);
        $messid = sanitize($_POST["messageid"]);
        if($message->Check_is_member($conn,$userid,$discussion)){
            if($message->delete_message($conn,$messid)){
                echo json_encode(["success"=>true,"message"=>"Message deleted"]);
            } else {
                echo json_encode(["success"=>false,"message"=>"Could not delete the message please try again"]);
            }
        } else {
            echo json_encode(["success"=>false,"message"=>"Failed you are not a member of this discussion."]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"You need to login to complete this action"]);
    }
}
if(isset($_POST["fetchmessages"])){
    $sessid = sanitize($_POST["sessid"]);
    $auth = new Auth();
    session_start();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        $discussion = sanitize($_POST['discussionid']);
        if($auth->auth_acc_verified($userid,$conn)){
            $message = new message();
            if($message->Check_is_member($conn,$userid,$discussion)){
               if($message->fetch_messages($conn,$userid,$discussion)){
                echo json_encode(["success"=>true,"message"=>"Message fetched successfully","messList"=>$message->get_mess_list()]);  
               } else {
                echo json_encode(["success"=>false,"message"=>"No mesage records found"]);  
               }
            } else {
                echo json_encode(["success"=>false,"message"=>"It seem like you are not a member of this discussion!"]);   
            }
        } else {
            echo json_encode(["success"=>false,"message"=>"Your account is not yet verified pleasea verify your account pleasae to continue please "]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"You need to login to complete this action"]);
    }
}
if(isset($_POST[""])){

}
//update model to auth the editor if is sender 