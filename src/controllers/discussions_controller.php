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
session_start();
require_once "../src/models/discuss_model.php";
require_once "../src/helpers/sanitation.php";
require_once "../src/config/db_config.php";
require_once "../src/middlewares/auth_middleware.php";
require_once "../src/helpers/file_handler.php";
require_once "../src/models/messages_model.php";
use jalikoa\FGIprogramme\discussion;
use jalikoa\FGIprogramme\Auth;
use jalikoa\FGIprogramme\message;
use jalikoa\FGIprogramme\file_handler;
if(isset($_POST["addnewdiscussion"])){
    $sessid = sanitize($_POST["sessid"]);
    $name = sanitize($_POST["discussionname"]);
    $image = $_FILES["discussionimage"];
    $filedest = __DIR__."/../uploads/";
    $img_name = $_FILES["discussionimage"]["name"];
    $about = sanitize($_POST["discussionabout"]);
    $type = sanitize($_POST["discussiontype"]);
    $whomess = sanitize($_POST["whomess"]);
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        $admin = $userid;
        $discussion = new discussion();
        $fhanlder = new file_handler();
        if($fhanlder->isImage($image)){
            if(!$fhanlder->isLarger($fhanlder->getSize($image),5120000)){
                $fhanlder->setName();
                $fname = $fhanlder->get_name();
                if($discussion->setCred($name,$admin,$fname,$about,$type,$whomess)){
                    if(!$discussion->check_discussion_exist($conn)){
                        if($fhanlder->upload($image,$filedest)){
                            if($discussion->save_discussion($conn)){
                             echo json_encode(["success"=>true,"message"=>"Discusion added successfully"]);
                            } else {
                                echo json_encode(["success"=>false,"message"=>"Sorry there was a problem adding the discusiion please try agian later."]);
                            }
                    }  else {
                        echo json_encode(["success"=>false,"message"=>"Sorry there was an error uploading your file please try again later."]);
                    } 
                } else {
                    echo json_encode(["success"=>false,"message"=>"Sorry a simillar discusion with the provided credentials exist please try new one."]);
                }
            } else {
                    echo json_encode(["success"=>false,"message"=>"Please ensure that you fill in all the necessary fields."]);
                }
            } else {
                echo json_encode(["Success"=>false,"message"=>"Please upload an image that is less than 5 MBS"]);
            }
        } else {
            echo json_encode(["success"=>false,"message"=>"Please ensure that the file that you upload is an image."]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please login to complete your action"]);
    }

}
if(isset($_POST["deletediscussion"])){
    $sesid = sanitize($_POST["sessid"]);
    $dissid = sanitize($_POST["dissid"]);
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sesid];
        $admin = $userid;
        $discussion = new discussion();
        if($discussion->isAdmin($conn,$userid)){
            if($discussion->delete_discussion($conn,$dissid)){
                echo json_encode(["success"=>false,"message"=>"Deleted! It is sad to see leaving!Join us again"]);
            } else {
                echo json_encode(["success"=>false,"message"=>"Not deleted please try again later"]);
            }
        } else {
            echo json_encode(["success"=>false,"message"=>"You do not have the appropriate permissions! Ensure that you are the admin of the group"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please login to complete your action"]);
    }

}
if(isset($_POST["editdiscussion"])){

}
if(isset($_POST["fetchdiscussioninfo"])){
    $sessid = $_POST['sessid'];
    $dissid = $_POST['dissid'];
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        $discussion = new discussion();
        if($discussion->Check_is_member($conn,$userid,$dissid)){
            echo json_encode(["Success"=>true,"Message"=>"Group info fetched successfully","cred"=>get_dis_info($conn,$dissid)]);
        } else {
            echo json_encode(["success"=>false,"message"=>"Acces denied Only members have access to this info"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
    }
}
if(isset($_POST["fetchDiscussionMembers"])){
    $sessid = $_POST['sessid'];
    $dissid = $_POST['discussionid'];
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        $discussion = new discussion();
        if($discussion->Check_is_member($conn,$userid,$dissid)){
            echo json_encode(["success"=>true,"Message"=>"Group members fetched successfully","cred"=>$discussion->fetch_diss_members($conn,$dissid)]);
        } else {
            echo json_encode(["success"=>false,"message"=>"Acces denied Only members have access to this info"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
    }
}
if(isset($_POST["adddiscussionmember"])){
    $sessid = $_POST['sessid'];
    $dissid = $_POST['dissid'];
    $memberId = $_POST['memberId'];
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[''];
        $discussion = new discussion();
        if($discussion->isAdmin($conn,$userid)){
        //  Adding discussion member can be restricted to admin or as well the members when allowed to do so 
        } else {
            echo json_encode(["success"=>false,"message"=>"Only Admin is authorised to do this"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
    }
}
if(isset($_POST["showtyping"])){

}
if(isset($_POST["blockuser"])){
    $sessid = $_POST['sessid'];
    $dissid = $_POST['dissid'];
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $discussion = new discussion();
        if($discussion->isAdmin($conn,$userid)){
            // Blocking the user should be only restricted to the admin
        } else {
            echo json_encode(["success"=>false,"message"=>"Only Admin is authorised to do this"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
    }
}
if(isset($_POST["clearchats"])){
    $sessid = $_POST['sessid'];
    $dissid = $_POST['dissid'];
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        $discussion = new discussion();
        if($discussion->isAdmin($conn,$userid)){
            if($discussion->delete_messages($conn,$dissid)){
                echo json_encode(["success"=>true,"message"=>"Messages deleted succesfully"]);
            } else {
                echo json_encode(["success"=>false,"message"=>"Try again later an unknown error occured"]);
            }
        } else {
            echo json_encode(["success"=>false,"message"=>"Only Admin is authorised to do this"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
    }
}
if(isset($_POST["fetchDiscussions"])){
    $sessid = $_POST['sessid'];
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        $discussion = new discussion();
        $list = $discussion->fetch_discussions($conn);
        if($list){
            echo json_encode(["success" => true,"message" => $list]);
        } else {
        echo json_encode(["success"=>false,"message"=>"No discussions found"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
    }
}
if(isset($_GET["getFile"])){
    file_handler::streamFile();
}
if(isset($_POST['checkMemberIsInGroup'])){
    $sessid = $_POST['sessid'];
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        $discussion = sanitize($_POST['discussionid']);
        $message = new message();
        $check = $message->Check_is_member($conn,$userid,$discussion);
        echo json_encode(["success" => $check,"message" => $check?"You are a member of the discussion":"You are not a member of the discussion"]);
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
    }
}
if(isset($_POST['joinGroup'])){
    $sessid = $_POST['sessid'];
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        $discussion = sanitize($_POST['discussionid']);
        $message = new message();
        if($message->Check_is_member($conn,$userid,$discussion)){
            echo json_encode(["success" => false,"message" =>"You are alreeady a member of the discussion"]);
        } else {
            $register = $message->add_member($userid,$discussion ,'0',$conn);
            echo json_encode(["success" => $register,"message" => $register?"You are now a member of the discussion":"Could not add you as a member of the discussion"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
    }

}