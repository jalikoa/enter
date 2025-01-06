<?php
/**
 * Future guardians initiative 
 *
 * @see       https://github.com/jalikoa/fgi/ The future guardians repository
 * @author    Calvince Owino Jalikoa (Kenya) <d34calvo@gmail.com>
 * @copyright 2024 - 2025 Calvince Owino CEO Jalsoft
 * @license   This programe is written for the specific needs of future guardians initiative and no part can be taken away without prior permissions
 * CEO JalSoft Calvince Owino
 * @see contact at +254799311413
 */
namespace jalikoa\FGIprogramme;
require_once '../src/mailer/sendmail.php';
class register{
    private $firstname;
    private $lastname;
    private $username;
    private $phone;
    private $email;
    private $bio;
    private $password;
    private $status;
    private $role;
    private $fblink;
    private $image;
    private $country;
    private $otp;
    private $cred;
    
    public function setCred($firstname,$lastname,$username,$phone,$email,$bio,$password,$status,$role,$fblink,$country){
        if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($phone) || empty($country)){
            return false;
        } else {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->username = $username;
            $this->phone = $phone;
            $this->email = $email;
            $this->bio = $bio;
            $this->password = $password;
            $this->status = $status;
            $this->role = $role;
            $this->fblink = $fblink;
            $this->country = $country;
            $this->otp = rand(1111,9999);
        }
    }
    public function check_user_exists($conn){
        $sql = "SELECT * FROM users WHERE phone = '$this->phone' OR  email = '$this->email'";
        $res = $conn->query($sql);
        $this->cred = ($res->num_rows > 0)?$res->fetch_assoc():0;
        return ($res->num_rows > 0)?true:false;
    }
    public function register_user($conn){
        $sql = "INSERT INTO users (firstname,lastname,username,phone,email,country,bio,status,role,fblink,otp,password) VALUES ('$this->firstname','$this->lastname','$this->username','$this->phone','$this->email','$this->country','$this->bio','$this->status','$this->role','$this->fblink','$this->otp','$this->password')";
        $res = $conn->query($sql);
        return ($res)?true:false;
    }

    public function send_otp(){
        // sending otp with mailer
        $mesSubject = 'Thank You for Joining us';
        $mesBody = '<h1>Greetings!</h1><p>Thank you for registering with the Future Guardians Initiative. Stay tuned for updates!</p>
        <p style="color:rgb(0,0,100);font-weight:bold;">Your OTP is '.$this->otp.'</p>
        <button style="padding:10px 10px;color:rgb(255, 255, 255);font-weight:500;background:rgb(0,100,0);border:none;border-radius:20px;">Not You</button>
    <br />';
        $altBody = 'Hey there and Welcome you are just a few steps from setting up your account! Enter this otp please to continue '.$this->otp;
        $address = $this->email;
       return sendMail($mesSubject,$mesBody,$altBody,$address);
    }
    public function getI($conn){
        $check = "SELECT id FROM users WHERE email = '$this->email'";
        return $conn->query($check)->fetch_assoc()["id"];
    }
}