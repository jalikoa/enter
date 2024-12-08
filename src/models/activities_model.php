<?php
//Activities including images,text,videos 
//Have subject i.e name type url description content 
#default url = 0 default content = 0;
#Activity 0-image,1-video,2-text
class activity {
    private $type;
    private $name;
    private $url;
    private $description;
    private $content;
    private $by;
    private $list;
    public function start($type,$name,$url,$description,$content,$by){
        if (empty($type) || empty($name) || empty($description) || empty($by)){
            return false;
        } else {
            $this->type = $type;
            $this->name = $name;
            $this->url = $url;
            $this->description = $description;
            $this->content = $content;
            $this->by = $by;
            return true;
        }
    }
    public function add_new_activity($conn){
        $add = "INSERT INTO activities (name,type,url,description,content,bywho) VALUES ('$this->name','$this->type','$this->url','$this->description','$this->content','$this->by')";
        $res = $conn->query($add);
        return ($res)?true:false;
    }
    public function check_activity_exists($conn){
        $check = "SELECT * FROM activities WHERE name = '$this->name' OR description = '$this->description'";
        $res = $conn->query($check);
        return ($res->num_rows > 0)?true:false;
    }
    public function delete_activity($conn,$activityid){
        $del = "DELETE FROM activities WHERE id = '$activityid'";
        $res = $conn->query($del);
        return ($res)?true:false;
    }
    public function edit_activity($conn,$activityid){
        $edit = "UPDATE activities SET name = '$this->name',type = '$this->type',url = '$this->url',description = '$this->description',content = '$this->content',bywho = '$this->by' WHERE id = '$activityid'";
        $res = $conn->query($edit);
        return ($res)?true:false;
    }
    public function fetch_all_activities($conn){
        $fetch = "SELECT * FROM activities";
        $fetch = $conn->query($fetch);
        if($fetch->num_rows > 0){
            while($row = $fetch->fetch->assoc()){
                $this->list[] = $row;
            }
            return true;
        } else {
            return false;
        }
    }
    public function get_activity_list(){
        return $this->list;
    }
}