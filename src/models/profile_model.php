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
class profile {
    private $cred;
    private $new_firstname;
    private $new_lastname;
    private $new_username;
    private $new_email;
    private $new_image;
    private $new_fblink;
    private $new_phone;
    private $new_country;
    private $new_bio;
  public function setCred($firstname,$lastname,$username,$email,$image,$fblink,$phone,$country,$bio){
    if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($phone)){
        return false;
    } else{
        $this->new_fisrstname = $firstname;
        $this->new_lastname = $lastname;
        $this->new_username = $username;
        $this->new_email = $email;
        $this->new_image = $image;
        $this->new_fblink = $fblink;
        $this->new_phone = $phone;
        $this->new_country = $country;
        $this->new_bio = $bio;
        return true;
    }
  }
  public  function fetch_user_particulars($conn,$usid){
        $sql = "SELECT firstname,lastname,email,phone,country,bio,username,image,fblink FROM users WHERE id = '$usid'";
        $res = $conn->query($sql);
        if($res->num_rows > 0){
            $this->cred = $res->fetch_assoc();
            return true;
        } else{
            return false;
        }
    }
    public function check_u_exists($conn,$usid){
      $fetch = "SELECT * FROM users  WHERE id = '$usid'";
      $res = $conn->query($fetch);
      $this->cred = ($res->num_rows > 0)?$res->fetch_assoc():0;
      return ($res->num_rows > 0)?true:false;
    }
    public function verify_u_password($password){
      return (password_verify($password,$this->cred["password"]))?true:false;
    }
  public function delete_account($conn,$usid){
    $sql = "DELETE FROM users WHERE id = '$usid'";
    $res = $conn->query($sql);
    return ($res)?true:false;
  }
  public function edit_profile($conn,$usid){
    $update = "UPDATE users SET firstname = '$this->new_firstname',lastname = '$this->new_lastname',email = '$this->new_email',phone = '$this->new_phone',username = '$this->new_username',bio = '$this->new_bio',fblink = '$this->new_fblink',country = '$this->new_country' WHERE id = '$uid'";
    $res = $conn->query($update); 
  }
  public function getCred(){
    return $this->cred;
  }
  public function change_password($conn,$uid,$new_pass){
    $set_pass = "UPDATE users SET password = '$new_pass' WHERE id = '$uid'";
    $res = $conn->query($set_pass);
    return ($res)?true:false;
}
}