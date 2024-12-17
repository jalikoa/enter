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
namespace jalikoa\FGIprogramme;
class login {
    private $email;
    private $password;
    private $cred;
    public function setCred($email,$password){
        if ( empty($email) || empty($password)){
            return false;
        } else {
            $this->email = $email;
            $this->password = $password;
            return true;   
        }
    }
    public function check_user_exist($conn){
        $sql = "SELECT * FROM users WHERE email = '$this->email'";
        $res = $conn->query($sql);
        if($res->num_rows > 0){
            $this->cred = $res->fetch_assoc();
            return true;
        } else {
            return false;
        }
    }
    public function check_blocked(){
        return ($this->cred["status"] == "2")?true:false;
    }
    public function check_acc_verified(){
        return ($this->cred["status"] == "1")?true:false;
    }
    public function check_password(){
        if(password_verify($this->password,$this->cred["password"])){
            return true;
        } else {
            return false;
        }
    }
    public function login_user(){
        session_start();
        $i = md5($this->cred["id"]);
        $_SESSION[$i] = $this->cred["id"];
        return true;
    }
    public function getI(){
        return md5($this->cred["id"]);
    }
}