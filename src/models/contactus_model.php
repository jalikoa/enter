<?php

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