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
namespace JalSoft\contactus_model;

class contact_us {
    private $email;
    private $message;
    private $country;
    private $name;
    public function setCred($email,$text,$country,$name){
        if(empty($email) || empty($text) || empty($country) || empty($name)){
            return false;
        } else {
        $this->email = $email;
        $this->message = $text;
        $this->country = $country;
        $this->name = $name;
        return true;
        }
    }
    public function sendContent($conn){
        $sql = "INSERT INTO contact_us (email,message,country,name) VALUES ('$this->email','$this->message','$this->country','$this->name')";
        $results = $conn->query($sql);
        if($results){
            return true;
        }   
    }
}