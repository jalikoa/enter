<?php

class manage_account {
    private $userId;
    private $userotp;
    private $email;
    private $genotp;
    private $cred;
    public function setCred_otp_action($uid,$uotp){
        if(empty($uid) || empty($uotp)){
            return false;
        } else {
            $this->userId = $uid;
            $this->userotp = $uotp;
            return true;
        }
    }
    public function check_u_exists($conn){
        $id = base64_decode($this->userId);
        $check = "SELECT * FROM users WHERE id = '$id'";
        $res = $conn->query($check);
        if($res->num_rows > 0){
          $holder = $res->fetch_assoc();
        }
        $this->cred = ($res->num_rows > 0)?$holder:0;
        return ($res->num_rows > 0)?true:false;
    }
    public function verify_otp(){
        return ($this->userotp == $this->cred["otp"])?true:false;
    }
    public function verify_account($conn){
        $id = base64_decode($this->userId);
        $update = "UPDATE users SET status = '1' WHERE id = '$id'";
        $res = $conn->query($update);
        return ($res)?true:false;
    }
    public function setCred_resetPass($email){
        if(empty($email)){
            return false;
        } else {
            $this->email = $email;
            return true;
        }
    }
    public function genOtp(){
        $this->genotp = rand(1111,9999);
        return true;
    }
    public function check_em_exixts($conn){
        $check = "SELECT * FROM users WHERE email = '$this->email'";
        $res = $conn->query($check);
        return ($res->num_rows > 0)?true:false;
    }
    public function save_otp($conn){
        $save = "UPDATE users SET status = '0',otp = '$this->genotp' WHERE email = '$this->email'";
        $res = $conn->query($save);
        return ($res)?true:false;
    }
    function getI($conn){
        $check = "SELECT id FROM users WHERE email = '$this->email'";
        $res = $conn->query($check);
        return $res->fetch_assoc()["id"];
    }
    function set_new_password($conn,$usid,$new_pass){
        $set_pass = "UPDATE users SET password = '$new_pass' WHERE id = '$usid'";
        $res = $conn->query($set_pass);
        return ($res)?true:false;
    }
}