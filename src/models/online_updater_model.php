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