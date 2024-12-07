<?php

class is_typing {
    private $userid;
    private $dissid;
    public function start($userid,$dissid){
        if(){
            return false;
        } else {
            $this->userid = $userid;
            $this->dissid = $dissid;
            return true;
        }
    }
    public function update($conn){
        $update = "UPDATE members SET typing = CURRENT_TIMESTAMP where id = '$this->uid'";
        $res = $conn->query($update);
        return ($res)?true:false;
    }
}