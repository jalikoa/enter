<?php
// Fetch queries
// Search queries
// Delete queries
// Respond to queries
// Delete * queries
require_once "../src/helpers/sanitation.php";
require_once "../src/middlewares/auth_middleware.php";
require_once "../src/models/queries_model.php";
require_once "../src/config/db_config.php";
session_start();
use jalikoa\FGIprogramme\Query;
use jalikoa\FGIprogramme\Auth;
if(isset($_POST["fetchqueries"])){
    $limit = sanitize($_POST['limit']);
    $offset = sanitize($_POST['offset']);
    $sessid = sanitize($_POST["sessid"]);
    $auth = new Auth();
   if($auth->check_logged_in($sessid)){
    $userid = $_SESSION[$sessid];
    if($auth->auth_admin($userid,$conn)){
        $query = new Query($conn);
        if($query->fetch_queries($limit,$offset,$order)){
            echo json_encode(["success"=>true,"message"=>"Queries fetched successfully","query_list"=>$query->get_query_list()]);
        } else {
            echo json_encode(["success"=>false,"message"=>"Could notfetch the query lists"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Access denied!Only Admin is authorised to do this!"]);
    }

   } else {
    echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
   }
}
if(isset($_POST["searchquery"])){
    $keyword = sanitize($_POST['keyword']);
    $sessid = sanitize($_POST["sessid"]);
    $auth = new Auth();
   if($auth->check_logged_in($sessid)){
    $userid = $_SESSION[$sessid];
    if($auth->auth_admin($userid,$conn)){
        $query = new Query($conn);
        if($query->search_query($keyword)){
            echo json_encode(["success"=>true,"message"=>"Queries fetched successfully","query_list"=>$query->get_query_list()]);
        } else {
            echo json_encode(["success"=>false,"message"=>"Could not get the serched query"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Access denied!Only Admin is authorised to do this!"]);
    }

   } else {
    echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
   }
}
if(isset($_POST["deletequeries"])){
    $sessid = sanitize($_POST["sessid"]);
    $auth = new Auth();
   if($auth->check_logged_in($sessid)){
    $userid = $_SESSION[$sessid];
    if($auth->auth_admin($userid,$conn)){
        $query = new Query($conn);
        if($query->delete_queries()){
            echo json_encode(["success"=>true,"message"=>"Records deleted successfuly"]);
        } else {
            echo json_encode(["success"=>false,"message"=>"Records not affected please try again later."]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Access denied!Only Admin is authorised to do this!"]);
    }

   } else {
    echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
   }
}
if(isset($_POST["respondquery"])){

}
if(isset($_POST["deletequery"])){
    $queryid = sanitize($_POST['queryid']);
    $sessid = sanitize($_POST["sessid"]);
    $auth = new Auth();
   if($auth->check_logged_in($sessid)){
    $userid = $_SESSION[$sessid];
    if($auth->auth_admin($userid,$conn)){
        $query = new Query($conn);
        if($query->delete_query($queryid)){
            echo json_encode(["success"=>true,"message"=>"Record deleted successfuly"]);
        } else {
            echo json_encode(["success"=>false,"message"=>"Could not delete the specified record."]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Access denied!Only Admin is authorised to do this!"]);
    }

   } else {
    echo json_encode(["success"=>false,"message"=>"Please Login to complete this action"]);
   }
}