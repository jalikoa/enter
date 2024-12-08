<?php
//delete
//fetch
//add
//show downloads
class resources{
    private $cred;
    private $name;
    private $type;
    private $url;
    private $description;
    private $content;
    private $bywho;
    private $ratings;
    private $all;
    private $books;
    private $images;
    private $videos;
    public function setType($type){
        $this->type = $type;
    }
    public function add_new_resource($conn){
        $add = "INSERT INTO resources (name,type,url,description,content,bywho,ratings) VALUES ('$this->name','$this->type','$this->url','$this->description','$this->content','$this->bywho','$this->ratings')";
        $res = $conn->query($add);
        return ($res)?true:false;
    }
    public function check_res_exist($conn){
        $check = "SELECT * FROM resources WHERE name = '$this->name'";
        $res = $conn->query($check);
        $this->cred = ($res->num_rows > 0)?$res->fetch_assoc():'0';
        return ($res->num_rows > 0)?true:false;
    }
    public function delete_res($conn,$resid){
        $del = "DELETE FROM resources WHERE id = '$resid'";
        $res = $conn->query($del);
        return ($res)?true:false;
    }
    public function load_all_res($conn){
        $load = "SELECT * FROM resources";
        $res = $conn->query($load);
       if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                $this->all[] = $row;
            }
            return true;
       } else {
        $this->all = '0';
        return false;
       }
    }
    #0-image,1-video,2-text
    public function load_images($conn){
        $load = "SELECT * FROM resources WHERE type = '0'";
        $res = $conn->query($load);
       if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                $this->images[] = $row;
            }
            return true;
       } else {
        $this->images = '0';
        return false;
       }
    }
    public function load_videos($conn){
        $load = "SELECT * FROM resources WHERE type = '1'";
        $res = $conn->query($load);
       if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                $this->videos[] = $row;
            }
            return true;
       } else {
        $this->videos = '0';
        return false;
       }
    }
    public function load_books($conn){
        $load = "SELECT * FROM resources WHERE type = '2'";
        $res = $conn->query($load);
       if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                $this->books[] = $row;
            }
            return true;
       } else {
        $this->books = '0';
        return false;
       }
    }
    public function get_all(){
        return $this->all;
    }
    public function get_images(){
        return $this->images;
    }
    public function get_videos(){
        return $this->videos;
    }
    public function get_books(){
        return $this->books;
    }
}