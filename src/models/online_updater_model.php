<?php

class isOnline {
    private $uid;
    public function start($userid){
        if(empty($userid)){
            return false;
        } else {
            $this->uid = $userid;
            return true;
        }
    }
    public function update_online($conn){
        $update = "UPDATE users SET last_seen = CURRENT_TIMESTAMP where id = '$this->uid'";
        $res = $conn->query($update);
        return ($res)?true:false;
    }
}