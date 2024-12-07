<?php

class discussion{
    private $name;
    private $admin;
    private $image;
    private $about;
    private $type;
    private $whomess;
    private $cred;
    public function setCred($name,$admin,$image,$about,$type,$whomess){
        if(empty($name) || empty($admin) || empty($image) || empty($about) || empty($type) || empty($whomess)){
            return false;
        } else {
            $this->name = $name;
            $this->admin = $admin;
            $this->image = $image;
            $this->about = $about;
            $this->type = $type;
            $this->whomess = $whomess;
            return true;
        }
    }
    public function check_discussion_exist($conn){
        $check = "SELECT * FROM discussions WHERE name = '$this->name'";
        $res = $conn->query($check);
        return ($res->num_rows > 0)?true:false;

    }
    public function delete_discussion($conn,$disid){
        $delete = "DELETE FROM discussions WHERE id = '$disid'";
        $res = $conn->query($delete);
        return ($res)?true:false;
    }
    public function delete_messages($conn,$disid){
        $delete = "DELETE * FROM messages WHERE id = '$disid'";
        $res = $conn->query($delete);
        return ($res)?true:false;
    }
    public function save_discussion($conn){
        $reg = "INSERT INTO discussions (name,admin,image,about,type,whomess) VALUES ('$this->name','$this->admin','$this->image','$this->about','$this->type','$this->whomess')";
        $res = $conn->query($reg);
        return ($reg)?true:false;
    }
    public function edit_discussion($conn){
        $edit = "UPDATE users SET name = '$this->name',image = '$this->image',about = '$this->about',type = '$this->type',whomess = '$this->whomess'";
        $res = $conn->query($edit);
        return ($res)?true:false;
    }
    public function fetch_discussions(){
        
    }
}