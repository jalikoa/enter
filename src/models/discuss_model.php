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
    Public function add_member($conn,$userid,$discussion_id,$role,$typing){
        $add = "INSERT INTO dissmembers (user_id,discussion_id,role,typing) VALUES ('$userid','$discussion_id','$role','$typing')";
        $res = $conn->query($add);
        return ($res)?true:false;
    }
    public function delete_member($conn,$userid){
        $del = "DELETE FROM dissmembers WHERE id = '$userid'";
        $res = $conn->query($sql);
        return ($res)?true:false;
    }
    public function get_u_id($conn,$name){
        return $this->cred();
    }
    public function check_m_exist($conn,$name){
        $check = "SELECT * FROM users WHERE id = '$name'";
        $res = $conn->query($sql);
        $d = ($res->num_rows > 0)?$res->fetch_assoc():'0';
        $this->cred = ($res->num_rows > 0)?$d["id"]:'0';
        return ($res->num_rows > 0)?true:false;
    }
    public function block_member(){
        //Block from accessing the group
        //Block member from sending message
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
        $edit = "UPDATE discussions SET name = '$this->name',image = '$this->image',about = '$this->about',type = '$this->type',whomess = '$this->whomess'";
        $res = $conn->query($edit);
        return ($res)?true:false;
    }
    public function fetch_discussions(){
        //fetch discussions list based on user location
    }
    public function fetch_diss_members($conn,$dissid){
        $fetch = "SELECT * FROM dissmembers WHERE disscussion_id = '$dissid'";
        //join tables to make even the images of the members visible on the page
    }
}