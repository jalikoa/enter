<?php

class is_typing {
    private $userid;
    private $dissid;
    public function start($userid,$dissid){
        if(empty($userid) || empty($dissid)){
            return false;
        } else {
            $this->userid = $userid;
            $this->dissid = $dissid;
            return true;
        }
    }
    public function update($conn){
        $update = "UPDATE dismembers SET typing = CURRENT_TIMESTAMP where id = '$this->userid' AND discussion_id = '$this->dissid'";
        $res = $conn->query($update);
        return ($res)?true:false;
    }
}