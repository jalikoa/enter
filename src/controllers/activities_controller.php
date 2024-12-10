<?php
// Add new
// Delete 
// Edit activity
if(isset($_POST["addactivity"])){
    $type = sanitize($_POST["activitytype"]);
    $name = sanitize($_POST["activitysubject"]);
    $url = sanitize($_POST["activityurl"]);//update this to be generated on the server side
    $description = sanitize($_POST["activitydescription"]);
    $content = sanitize($_POST["activitycontent"]);
    $by = sanitize($_POST["activityby"]);
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        if($auth->auth_admin($userid,$conn)){
            $activity = new activity();
            if($activity->start($type,$name,$url,$description,$content,$by)){
                if(!$activity->check_activity_exists($conn)){
                    if($activity->add_new_activity($conn)){
                        echo json_encode(["success"=>true,"message"=>"Activity added succesfully"]);
                    } else {
                        echo json_encode(["success"=>false,"message"=>"Could not add the activity please try again later"]);
                    }
                } else {
                    echo json_encode(["success"=>false,"message"=>"An activity already exists like the one you want to add"]);
                }
            } else {
                echo json_encode(["success"=>false,"message"=>"Please ensure that you fill in all the fields before submitting!"]);
            }
            
        } else {
            echo json_encode(["success"=>false,"message"=>"Action rejected only admins are allowed to complete this action!"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please login to continue your action"]);
    }

}
if(isset($_POST["deleteactivity"])){
    $acid = sanitize($_POST["activityid"]);
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        if($auth->auth_admin($userid,$conn)){
            $activity = new activity();
            if($activity->delete_activity($conn,$acid)){
                echo json_encode(["success"=>true,"message"=>"Activity deleted successfully"]);
            } else {
                echo json_encode(["success"=>true,"message"=>"Activity not deleted Try again later!"]);
            }
        } else {
            echo json_encode(["success"=>false,"message"=>"Action rejected only admins are allowed to complete this action!"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please login to continue your action"]);
    }

}
if(isset($_POST["viewactivity"])){
    $activity = new activity();
    if($activity->fetch_all_activities($conn)){
        echo json_encode(["success"=>true,"message"=>"Records fetched succesfully!","list"=>$activity->get_activity_list()]);
    } else {
        echo json_encode(["success"=>false,"message"=>"No record exists!"]);
    }

}
if(isset($_POST["editactivity"])){
    $acid = sanitize($_POST["activityid"]);
    $type = sanitize($_POST["activitytype"]);
    $name = sanitize($_POST["activitysubject"]);
    $url = sanitize($_POST["activityurl"]);//update this to be generated on the server side
    $description = sanitize($_POST["activitydescription"]);
    $content = sanitize($_POST["activitycontent"]);
    $by = sanitize($_POST["activityby"]);
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        if($auth->auth_admin($userid,$conn)){
            $activity = new activity();
            if($activity->start($type,$name,$url,$description,$content,$by)){
                    if($activity->edit_activity($conn,$acid)){
                        echo json_encode(["success"=>true,"message"=>"Activity edited succesfully"]);
                    } else {
                        echo json_encode(["success"=>false,"message"=>"Could not edit the activity please try again later"]);
                    }
            } else {
                echo json_encode(["success"=>false,"message"=>"Please ensure that you fill in all the fields before submitting!"]);
            }
            
        } else {
            echo json_encode(["success"=>false,"message"=>"Action rejected only admins are allowed to complete this action!"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please login to continue your action"]);
    }

}