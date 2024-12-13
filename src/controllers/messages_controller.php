<?php
if(isset($_POST["sendmessage"])){
    $text = sanitize($_POST["message"]);
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $message = new message();
        $sender = $userid;
        $message = $text;
        $discussion = sanitize($_POST["discussionid"]);
        $type = ;
        $reply_to = '0';
        if(isset($_POST["replyto"])){
            $reply_to = sanitize($_POST["replyto"]);
        }
        if ($message->Check_is_member($conn,$userid,$discussion)){
            if($message->setCred($sender,$message,$discussion,$type,$reply_to)){
                if($message->check_is_blocked() == '1'){
                    if($message->send_message($conn)){
                        echo json_encode(["success"=>true,"message"=>"message sent"]);
                    } else {
                        echo json_encode(["success"=>false,"message"=>"Message not sent please try agian later please "]);
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
        if($message->Check_is_member($conn,$userid,$disid)){
            
        } else {
            echo json_encode(["success"=>false,"message"=>""]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"You need to login to complete this action"]);
    }
}
if(isset($_POST["fetchmessages"])){
    $sessid = sanitize($_POST["sessid"]);
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        if(){

        } else {
            echo json_encode(["success"=>false,"message"=>""]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"You need to login to complete this action"]);
    }
}
if(isset($_POST[""])){

}
//update model to auth the editor if is sender 