<?php  
 require_once "../src/helpers/sanitation.php";
 require_once "../src/middlewares/auth_middleware.php";
 require_once "../src/models/members_model.php";
 require_once "../src/config/db_config.php";
 session_start();
use jalikoa\FGIprogramme\members;
use jalikoa\FGIprogramme\Auth;
if(isset($_POST["fetchmebers"])){
    $sessid = sanitize($_POST["sessid"]);
    $start = sanitize($_POST["start"]);
    $limit = sanitize($_POST["limit"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        if($auth->auth_admin($userid,$conn)){
            $member = new  members();
            if ($member->fetch_members($conn,$start,$limit)){
                echo json_encode(["success"=>true,"message"=>"List fetched succesfully!","list"=>$member->get_member_list()]);
            } else {
                echo json_encode(["success"=>false,"message"=>"Sorry no member records were found!"]);
            }
        }  else {
            echo json_encode(["success"=>false,"message"=>"Access denied!Only Admin is authorised to do this!"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
       }
}
if(isset($_POST["searchmember"])){
    $sessid = sanitize($_POST["sessid"]);
    $nm_em = sanitize($_POST["searchitem"]);
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        if($auth->auth_admin($userid,$conn)){
            $member = new  members();
            if ($member->search_members($conn,$nm_em)){
                echo json_encode(["success"=>true,"message"=>"List fetched succesfully!","list"=>$member->get_member_list()]);
            } else {
                echo json_encode(["success"=>false,"message"=>"Sorry no member records were found!"]);
            }
        }  else {
            echo json_encode(["success"=>false,"message"=>"Access denied!Only Admin is authorised to do this!"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
       }
}
if(isset($_POST["addnewmember"])){
    $uname = sanitize($_POST["username"]);
    $uemail = sanitize($_POST["useremail"]);
    $uphone = sanitize($_POST["userphone"]);
    $ucountry = sanitize($_POST["usercountry"]);
    $urole = sanitize($_POST["userrole"]);
    $sessid = sanitize($_POST["sessid"]);
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        $userid = $_SESSION[$sessid];
        if($auth->auth_admin($userid,$conn)){
            $member = new  members();
            if($member->setCred($uname,$uemail,$uphone,$ucountry,$urole)){
               if(!$member->check_member_exists($conn)){
                if($member->add_member($conn)){
                    echo json_encode(["success"=>true,"message"=>"Member added succesfully"]);
                } else {
                    echo json_encode(["success"=>false,"message"=>"Member could not be added please try again later"]);
                }
               } else {
                echo json_encode(["success"=>false,"message"=>"Member already exists with the credentials"]);
               }
            } else {
                echo json_encode(["success"=>false,"message"=>"Please fill in all the necessary fields please"]);
            }
        }  else {
            echo json_encode(["success"=>false,"message"=>"Access denied!Only Admin is authorised to do this!"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
       }
}
if(isset($_POST["deletemember"])){
    $memberid = sanitize($_POST["memberid"]);
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $auth = new Auth();
    if($auth->check_logged_in($sessid)){
        if($auth->auth_admin($userid,$conn)){
            $member = new  members();
            if($member->setCred_uid($memberid)){
                if($member->delete_member($conn)){
                    echo json_encode(["success"=>true,"message"=>"Delete succesfull"]);
                } else {
                    echo json_encode(["success"=>false,"message"=>"Member could not be deleted please try again later"]);
                }
            } else {
                echo json_encode(["success"=>false,"message"=>"User is anonymous and could not be deleted!Try refreshing your page if this persists please"]);
            }
        }  else {
            echo json_encode(["success"=>false,"message"=>"Access denied!Only Admin is authorised to do this!"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
       }
}
if(isset($_POST["editmember"])){
    $uname = sanitize($_POST["username"]);
    $uemail = sanitize($_POST["useremail"]);
    $uphone = sanitize($_POST["userphone"]);
    $ucountry = sanitize($_POST["usercountry"]);
    $urole = sanitize($_POST["userrole"]);
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    $auth = new Auth();
   if($auth->check_logged_in($sessid)){
    if($auth->auth_admin($userid,$conn)){
        $member = new  members();
        if($member->setCred($uname,$uemail,$uphone,$ucountry,$urole)){
            if($member->edit_member($conn)){
                echo json_encode(["success"=>true,"message"=>"Records edit3e succesfully!"]);
            } else {
                echo json_encode(["success"=>false,"message"=>"Could not update the members credentials please try again later"]);
            }
        } else {
            echo json_encode(["success"=>false,"message"=>"All the fields are required.Now ensure that you fill all of them"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Access denied!Only Admin is authorised to do this!"]);
    }

   } else {
    echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
   }
}