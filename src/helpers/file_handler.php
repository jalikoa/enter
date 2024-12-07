<?php

class file_handler {
    $name
    $size
    public function size(){
        return $this->size;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function isImage($extension){

    }
    public function isVideo($extension){

    }
    public function isDocument($extension){

    }
    public function genName($extension){
        $extension = strtolower(end(explode('.',$name)));
        $this->name = "FGI_".md5(time()).$extention;

    }
    public function upload($file,$dir){

    }
    public function getSize($file){
        
    }
}