<?php

class message {
    private $message;
    private $sender;
    private $discussion;
    private $type;#edited or original i.e orig->0 edited->1
    private $reply_to;#if reply have the mess_id for the reply

    public function setCred($sender,$message,$discussion,$type,$reply_to){
        if(empty($message) || empty($sender) || empty($discussion) || empty($type) || empty($reply_to)){
            return false;
        } else {
            $this->sender = $sender;
            $this->message = $message;
            $this->discussion = $discussion;
            $this->type = $type;
            $this->reply_to = $reply_to;
            return true;
        }
    }
    public function send_message($conn){
        $send = "INSERT INTO messages (sender,message,discussion,type,reply_to) VALUES ('$this->sender','$this->messgae','$this->discussion','$this->type','$this->reply_to')";
        $res = $conn->query($res);
        return ($res)?true:false;        
    }
    public function edit_message($conn,$new_sms,$messid){
        $edit = "UPDATE messages SET message = '$new_sms',type = '1' WHERE id = '$messid'";
        $res = $conn->query($edit);
        return ($res)?true:false;
    }
    public function delete_message($conn,$messid){
        $del = "UPDATE messages SET message = 'Deleted',type = '0' WHERE id = '$messid'";
        $res = $conn->query($del);
        return ($res)?true:false;
    }
    public function fetch_messages($conn){
        #join tables to make it more easier for you to display the data when it comes to the front end
        $fetch = "SELECT  ";
    }
}