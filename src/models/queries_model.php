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
// Fetch queries
// Search queries
// Delete queries
// Respond to queries
// Delete * queries
namespace jalikoa\FGIprogramme;
class Query {
    private $conn;
    private $query_list;
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function fetch_queries($limit,$offset,$order){
        $fetch = "SELECT * FROM contact_us  ORDER BY created_at '$order' LIMIT '$limit' OFFSET '$offset'";
        $res = $this->$conn->query($fetch);
        $this->query_list = ($res->num_rows > 0)?$res->fetch_assoc:null;
        return ($res)?true:false;
    }
    public function delete_queries($id){
        $del = "DELETE FROM contact_us";
        $res = $this->conn->query($del);
        return ($res)true?:false;
    }
    public function delete_query($id){
        $del = "DELETE FROM contact_us WHERE id = '$id'";
        $res = $this->con->query($del);
        return ($res)?true:false;
    }
    public function get_query_list(){
        return $this->query_list;
    }
}