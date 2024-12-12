<?php

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
        public function fetch_members($conn){
            $fetch = "SELECT * FROM members";
            $res = $conn->query($fetch);
            if($res->num_rows > 0){
                $this->members_list = $res->fetch_assoc();
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