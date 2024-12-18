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
    class members {
        private $name;
        private $email;
        private $phone;
        private $country;
        private $cred;
        private $role;
        private $members_list;
        private $uid;
        public function setCred_uid($uid){
            if(empty($uid)){
                return false;
            } else {
                $this->uid = $uid;
                return false;
            }
        }  
        public function setCred($uname,$uemail,$uphone,$ucountry,$urole){
            if(empty($uname) || empty($uemail) || empty($uphone) || empty($ucountry) || empty($urole)){
                return false;
            } else {
                $this->name = $uname;
                $this->email = $uemail;
                $this->phone = $uphone;
                $this->country = $ucountry;
                $this->role = $urole;
                return true;
            }
        }
        public function check_member_exists($conn){
            $check = "SELECT * FROM members WHERE email = '$this->email' OR phone = '$this->phone'";
            $res = $conn->query($check);
            $this->cred = ($res->num_rows > 0)?$res->fetch_assoc():0;
            return ($res->num_rows > 0)?true:false;
        }
        public function fetch_members($conn,$start,$limit){
            $fetch = "SELECT * FROM members LIMIT $start,$limit";
            $res = $conn->query($fetch);
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                    $this->members_list[] = $row;
                }
                return true;
            } else {
                return false;
            }
        }
        public function search_members($conn,$nm_em){
            $fetch = "SELECT * FROM members WHERE name REGEXP '$nm_em' OR email REGEXP '$nm_em'";
            $res = $conn->query($fetch);
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                    $this->members_list[] = $row;
                }
                return true;
            } else {
                return false;
            }
        }
        public function add_member($conn){
            $add = "INSERT INTO members (name,email,phone,country,role) VALUES ('$this->name','$this->email','$this->phone','$this->country','$this->role')";
            $res = $conn->query($add);
            return ($res)?true:false;

        }
        public function delete_member($conn){
            $delete = "DELETE FROM members WHERE id = '$this->uid'";
            $res = $conn->query($delete);
            return ($res)?true:false;
        }
        public function edit_member($conn){
            $edit = "UPDATE members SET name = '$this->name',email = '$this->email',phone = '$this->phone',country = '$this->country',role = '$this->role' WHERE id = '$this->uid'";
            $res = $conn->query($sql);
            return ($res)?true:false;
        }  
        public function get_member_list(){
            return $this->members_list;
        } 
    }