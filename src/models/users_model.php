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
// delete user
// block user
// Fetch users
class users  {
    private $userId;
    private $cred;
    private $list;
    private $total;
    public function fetch_users($conn,$limit){
        $fetch = "SELECT firstname,lastname,username,phone,email,country,bio,last_seen,image,registered_at FROM users WHERE role = '1' AND status = '1'";
        $res = $conn->query($fetch);
        $this->cred = ($res->num_rows > 0)?$res->fetch_assoc():'0';
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                $this->list[] = $row;
            }
        }
        return ($res->num_rows > 0)?true:false;
    }   
    public function blockUser($conn,$usid){
        $block = "UPDATE users SET status = '2' WHERE id = '$usid'";
        $res = $conn->query($block);
        return ($res)?true:false;
    }
    public function unblockUser($conn,$usid){
        $unblock = "UPDATE users SET status = '1' WHERE id = '$usid'";
        $res = $conn->query($unblock);
        return ($res)?true:false;
    }
    public function deleteUser($conn,$usid){
        $delete = "DELETE FROM users WHERE id = '$usid'";
        $res = $conn->query($delete);
        return ($res)?true:false;
    }
    public function check_u_exists($conn,$usid){
        $check = "SELECT * FROM users WHERE id = '$usid'";
        $res = $conn->query($check);
        $this->cred = ($res->num_rows > 0)?$res->fetch_assoc():'0';
        return ($res->num_rows > 0)?true:false;
    }
    public function add_new_user(){
        //update this function in the controller to use the registration_model model
    }
    public function fetch_total_users($conn){
        $get = "SELECT COUNT(id) FROM `users` WHERE role = '1' AND status = '1'";
        $res = $conn->query($get);
        $this->total = $res->fetch_assoc()["COUNT(id)"];
        return ($res->num_rows > 0)?true:false;
    }
    public function getTotal(){
        return $this->total;
    }
    public function get_users_list(){
        return $this->list;
    }
}