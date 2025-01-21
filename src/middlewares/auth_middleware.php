<?php
namespace jalikoa\FGIprogramme;
// Simple session based authentiacation
class Auth {
    public function check_logged_in($sessid){
        return (isset($_SESSION[$sessid]))?true:false;
    }
    public function auth_admin($uid,$conn){
        $check = "SELECT * FROM users WHERE id = '$uid'";
        $res = $conn->query($check);
        return ($res->fetch_assoc()["role"] == "0")?true:false;
    }
    public function auth_user($uid,$conn){
        $check = "SELECT * FROM users WHERE id = '$uid'";
        $res = $conn->fetch_assoc();
        return ($res->fetch_assoc()["role"] == "1")?true:false;
    }
    public function auth_acc_verified($uid,$conn){
        $check = "SELECT * FROM users WHERE id = '$uid'";
        $res = $conn->query($check);
        return ($res->fetch_assoc()["status"] == "1")?true:false;
    }
}