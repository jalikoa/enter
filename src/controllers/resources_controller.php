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
use jalikoa\FGIprogramme\Auth;
use jalikoa\FGIprogramme\resources;
if(isset($_POST["addnew"])){
    $name = sanitize($_POST["name"]);
    $type;
    $url  = sanitize($_POST["name"]);//add logics here on how to gen name of the file plus dir 
    $description  = sanitize($_POST["description"]);
    $content  = sanitize($_POST["contents"]);
    $bywho = sanitize($_POST["bywho"]);
    $ratings = sanitize($_POST["name"]);
    $resource = new resources();

}
if(isset($_POST["delete"])){
    $resid = sanitize($_POST["resid"]);
    $auth = new Auth();
    $sessid = sanitize($_POST["sessid"]);
    $userid = "";
    if(isset($sessid)){
        $userid = $_SESSION[$sessid];
    }
    if($auth->check_logged_in($sessid)){
        if($auth->auth_admin($userid,$conn)){
            $resource = new resources();
            if($resource->delete_res($conn,$resid)){
                echo json_encode(["success" => true,"message" => "Resource deleted succesfully."]);
            } else {
                echo json_encode(["success"=>false,"message"=>"Sorry could not delete the resource try again later"]);
            }
        } else {
            echo json_encode(["success"=>false,"message"=>"Action incomplete!Only admins is authorised to do this"]);
        }
    } else {
        echo json_encode(["success"=>false,"message"=>"Please login to continue!"]);
    }

}
if(isset($_POST["loadall"])){
    $resource = new resources();
    if($resource->load_all_res($conn)){
        echo json_encode(["success"=>true,"message"=>"Loaded all learning resources","list"=>$resource->get_all()]);
    } else {
        echo json_encode(["success" => false,"message" => "Sorry no records exists in the database.Try again later please."]);
    }
}
if(isset($_POST["loadimages"])){
    $resource = new resources();
    if($resource->load_images($conn)){
        echo json_encode(["success"=>true,"message"=>"Loaded all learning resources","list"=>$resource->get_images()]);
    } else {
        echo json_encode(["success" => false,"message" => "Sorry no records exists in the database.Try again later please."]);
    }
}
if(isset($_POST["loadvideos"])){
    $resource = new resources();
    if($resource->load_videos($conn)){
        echo json_encode(["success"=>true,"message"=>"Loaded all learning resources","list"=>$resource->get_videos()]);
    } else {
        echo json_encode(["success" => false,"message" => "Sorry no records exists in the database.Try again later please."]);
    }
}
if(isset($_POST["loadbooks"])){
    $resource = new resources();
    if($resource->load_books($conn)){
        echo json_encode(["success"=>true,"message"=>"Loaded all learning resources","list"=>$resource->get_books()]);
    } else {
        echo json_encode(["success" => false,"message" => "Sorry no records exists in the database.Try again later please."]);
    }
}