<?php
if(isset($_POST["addnew"])){
    $name = sanitize($_POST["name"]);
    $type;
    $url  = sanitize($_POST["name"]);//add logics here on how to gen name of the file plus dir 
    $description  = sanitize($_POST["description"]);
    $content  = sanitize($_POST["contents"]);
    $bywho = sanitize($_POST["bywho"]);
    $ratings = sanitize($_POST["name"]);
    $resource = new resources();

}
if(isset($_POST["delete"])){

}
if(isset($_POST["loadall"])){

}
if(isset($_POST["loadimages"])){

}
if(isset($_POST["loadvideos"])){

}
if(isset($_POST["loadbooks"])){

}