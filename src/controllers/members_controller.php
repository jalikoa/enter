<?php   
if(isset($_POST["fetchmembers"])){

}
if(isset($_POST["addmember"])){

}
if(isset($_POST["deletemember"])){
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        if($auth->auth_admin($userid,$conn)){
            $activity = new activity();
        }
    }
}
if(isset($_POST["editmember"])){
    $auth = new Auth();
   if($auth->){
    if($auth->auth_admin($uid,$conn)){

    } else {
        echo json_encode(["success"=>false,"message"=>"Access denied!Only Admin is authorised to do this!"]);
    }

   } else {
    echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
   }
}
if(isset($_POST[""])){

}