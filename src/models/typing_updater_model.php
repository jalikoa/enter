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
        $update = "UPDATE dissmembers SET typing = CURRENT_TIMESTAMP where user_id = '$this->userid' AND discussion_id = '$this->dissid'";
        $res = $conn->query($update);
        echo $this->userid;
        echo $this->dissid;
        return ($res)?true:false;
    }
}