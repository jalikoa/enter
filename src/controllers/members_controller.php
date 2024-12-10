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

}
if(isset($_POST[""])){

}