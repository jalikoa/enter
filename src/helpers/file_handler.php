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
        $img = new array('jpg','jpeg','png','gif');
        return (in_array($extension,$img))?true:false;
    }
    public function isVideo($extension){
        $vid= new array('mov','mp4');
        return (in_array($extension,$vid))?true:false;
    }
    public function isDocument($extension){

    }
    public function genName($extension){
        $extension = strtolower(end(explode('.',$name)));
        $this->name = "FGI_".md5(time());
        $this->name .= str_shuffle('JALIKOAceojalsoft');
        $this->name .= $extention;
    }
    public function upload($file,$dir){
        $res = move_uploaded_file($file,$dir);
        return ($res)?true:false;
    }
    public function getSize($file){
        $this->size = filesize($file);
        return filesize($file);
    }
    public function isLarger($value,$max){
        return ()?true:false;
    }
}