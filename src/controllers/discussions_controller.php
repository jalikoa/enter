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
// Add new
// Send text
// Record someone is online
// Record that someone is typing
// Admin aprove users join 
// Admin block users
// Admin add users no add user not in community
// Admin delete chats as well as discussion forum
require_once "../src/models/discuss_model.php";
require_once "../src/helpers/sanitation.php";
require_once "../src/config/db_config.php";
require_once "../src/middlewares/auth_middleware.php";
use jalikoa\FGIprogramme\discussion;
use jalikoa\FGIprogramme\Auth;
use jalikoa\FGIprogramme\file_handler;
if(isset($_POST["adddiscussion"])){
    $sesid = sanitize($_POST["sessid"]);
    $name = santize($_POST["discussionname"]);
    $image = $_FILES["discussionimage"];
    $filedest = "./uploads/";
    $name = $_FILES["discussionimage"]["name"];
    $about = santize($_POST["discussionabout"]);
    $type = santize($_POST["discuaaiontype"]);
    $whomes = santize($_POST["whomess"]);
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sesid];
        $admin = $userid;
        $discussion = new discussion();
        $fhanlder = new file_handler();
        if($fhanlder->){

        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please login to complete your action"]);
    }

}
if(isset($_POST["deletediscussion"])){
    $sesid = sanitize($_POST["sessid"]);
    $disid = sanitize($_POST["dissid"]);
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sesid];
        $admin = $userid;
        $discussion = new discussion();
        if($discussion->isAdmin($conn,$userid)){
            if($discussion->delete_discussion($conn,$disid)){
                echo json_encode("success"=>false,"message"=>"Deleted! It is sad to see leaving!Join us again")
            } else {
                echo json_encode(["success"=>false,"message"=>"Not deleted please try again later"]);
            }
        } else {
            echo json_encode(["success"=>false,"message"=>"You do not have the appropriate permissions!"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please login to complete your action"]);
    }

}
if(isset($_POST["editdiscussion"])){

}
if(iset($_POST["fetchdiscussioninfo"])){

}
if(isset($_POST["adddiscussionmember"])){

}
if(isset($_POST["showtyping"])){

}
if(isset($_POST["blockuser"])){

}
if(isset($_POST["clearchats"])){
    $sessid = $_POST['sessid'];
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $discussion = new discussion();
        if($discussion->){

        } else {
            echo json_encode("success"=>false,"message"=>"");
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
    }
}