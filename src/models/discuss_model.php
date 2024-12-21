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
    private $discussionslist;
    private $discussion_members;
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
    public function isAdmin($conn,$uid){
        $check = "SELECT * FROM dissmembers WHERE id = '$uid'";
        $res = $conn->query($check);
        return ($res->fetch_assoc()["role"]=="0")?true:false;
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
        $delete = "DELETE * FROM messages WHERE discussion = '$disid'";
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
        //fetch discussions list based on user location or based on the preference
        $fetch = "SELECT d.name AS groupname,
    d.admin AS adminid,
    d.about,
    d.type,
    d.whomess,
    d.image AS grouplogo,
    u.username,
    u.country,
    u.bio,
    u.image AS userimage FROM 
	discussions AS d
    JOIN users AS u
    ON u.id = d.admin;";
    $res = $conn->query($sql);
    if($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
            $this->discussionslist[] = $row; 
        }
        return true;
    } else {
        return false;
    }
}
public function get_dis_list(){
    return $this->discussionslist;
}
    public function fetch_diss_members($conn,$dissid){
        $fetch = "SELECT d.user_id AS id,
        d.role,d.typing,
        d.created_at AS datejoined ,
        u.username,
        u.country,
        u.last_seen AS online,
        u.bio,
        u.image FROM dissmembers AS d 
        JOIN users AS u
        ON u.id = d.user_id WHERE d.discussion_id = '$dissid' ORDER BY typing DESC;";
        $res = $conn->query($fetch);
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                $this->discussion_members[]=$row;
            }
            return true;
        } else {
            return false;
        }
    }
    public function get_dis_info($conn,$dissid){
        $get = "SELECT d.name AS groupname,
    d.admin AS adminid,
    d.about,
    d.type,
    d.whomess,
    d.image AS grouplogo,
    u.username,
    u.country,
    u.bio,
    u.image AS userimage FROM 
	discussions AS d
    JOIN users AS u
    ON u.id = d.admin WHERE d.id = '$dissid';";
        $res = $conn->query($get);
        $li;
        while($row = $res->fetch_assoc()){
            $li[] = $row;
        }
        return $li;
    }
    public function get_dis_members(){
        return $this->discussion_members;
    }
}