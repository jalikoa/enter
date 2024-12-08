<?php
//delete
//fetch
//add
//show downloads
class resources{
    private $type;
    private $cred;
    private $name;
    private $type;
    private $url;
    private $description;
    private $content;
    private $bywho;
    private $ratings;
    public function setType($type){
        $this->type = $type;
    }
    public function add_new_resource(){
        $add = "INSERT INTO resources (name,type,url,description,content,bywho,ratings) VALUES ()"
    }
}