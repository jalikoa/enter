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
class message {
    private $message_list;
    private $message;
    private $sender;
    private $discussion;
    private $type;#edited or original i.e orig->0 edited->1 forwarded -> 2
    private $reply_to;#if reply have the mess_id for the reply else default 0

    public function setCred($msender,$mmessag,$mdiscussion,$mtype,$mreply_to){
        if(empty($msender) || empty($mmessag) || empty($mdiscussion)){
            return false;
        } else {
            $this->sender = $msender;
            $this->message = $mmessag;
            $this->discussion = $mdiscussion;
            $this->type = $mtype;
            $this->reply_to = $mreply_to;
            return true;
        }
    }
    public function check_is_blocked(){
        //Add logics in this function and aim at checkin when user is blocked by admin in the forum
        return '0';

    }
    public function send_message($conn){
        $send = "INSERT INTO messages (sender,message,discussion,type,reply_to) VALUES ('$this->sender','$this->message','$this->discussion','$this->type','$this->reply_to')";
        $res = $conn->query($send);
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
    public function fetch_messages($conn,$userid,$dissid){
        #join tables to make it more easier for you to display the data when it comes to the front end
        $fetch = "SELECT m.id,
        m.sender,
        m.message,
        m.discussion,
        m.type,
        m.reply_to,
        	CASE 
            WHEN TIMESTAMPDIFF(MINUTE,m.created_at,NOW())<=1440
            	THEN DATE_FORMAT(m.created_at,'Today %H:%i') 
                ELSE DATE_FORMAT(m.created_at,'%W %D %M %H:%i') 
             END AS timesent,
        u.username,
        u.country,
        CASE WHEN TIMESTAMPDIFF(SECOND,u.last_seen,NOW())<= 30
        THEN 'online' ELSE 'offline' END AS online,
        CASE WHEN TIMESTAMPDIFF(SECOND,d.typing,NOW())<= 10
        THEN 'typing' ELSE 'nottyping' END AS typing,
        u.bio,
        u.image  FROM `messages` AS m
         JOIN users AS u 
         ON u.id = m.sender 
         JOIN dissmembers AS d
          ON d.user_id = u.id 
          WHERE discussion = '$dissid'
          ORDER BY m.id ASC;";
          $res = $conn->query($fetch);
          if($res->num_rows > 0){
            $i = 0;
            while($row = $res->fetch_assoc()){
                $this->message_list[] = $row;
                $this->message_list[$i]["you"] = ($userid === $row["sender"])?true:false;
                $i++;
            }
            return true;
          } else {
            return false;
          }
    }
    public function Check_is_member($conn,$userid,$dissid){
        $check = "SELECT * FROM dissmembers WHERE user_id = '$userid' AND discussion_id = '$dissid'";
        $res=$conn->query($check);
        return ($res->num_rows > 0)?true:false;
    }
    public function get_mess_list(){
        return $this->message_list;
    }
}