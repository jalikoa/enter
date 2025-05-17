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
    private $name;
    private $size;
    private $extension;
    public function get_mime($file){
        return mime_content_type($file['tmp_name']);
    }
    public function get_ext($file){
        $tmpName = $file["name"];
        $extension = pathinfo($tmpName,PATHINFO_EXTENSION);
        $this->extension = $extension;
        return $extension;
    }
    public function setName($name = null) {
        if ($name === null) {
            $gen = $this->genName($this->extension);
            $this->name = $gen;
        } else {
        $this->name = $name;
        }
    }    
    public function isImage($file){ 
       $extension =  $this->get_ext($file);
       $this->extension = $extension;
        $img = array('jpg', 'jpeg', 'png', 'gif');
        return (in_array(strtolower($extension),$img))?true:false;
    }
    public function isVideo($file){
        $extension = $this->get_ext($file);
        $vid_ext = array('mov','mp4');
        return (in_array(strtolower($extension),$vid_ext))?true:false;
    }
    public function isDocument($file){
        
    }
    public function genName($extension){
        $gen_name = "FGI_".md5(time());
        $gen_name .= str_shuffle('JALIKOAceojalsoft');
        $gen_name .= '.'.$extension;
        return $gen_name;
    }
    public function upload($file,$dir){
        $tmp_name = $file['tmp_name'];
        if(!file_exists($dir)){
            mkdir($dir,0777,true);
        }
        $res = move_uploaded_file($tmp_name,$dir.$this->get_name());
        return ($res)?true:false;
    }
    public function getSize($file){
        $filename = $file['tmp_name'];
        return filesize($filename);
        
    }
    public function isLarger($value,$max){
        return ($value > $max)?true:false;
    }
    public function hey(){
        return $this->get_name();
    }
    public function get_name(){
        return $this->name;
    }
    public static function streamFile() {
        $baseDir = __DIR__ . "/../uploads";
        $relativeName = basename($_GET['name']);
        $fullPath = $baseDir . DIRECTORY_SEPARATOR . $relativeName;
        header("Content-Type: " . mime_content_type($fullPath));
        header("Content-Length: " . filesize($fullPath));
        readfile($fullPath);
        exit;
    }
}