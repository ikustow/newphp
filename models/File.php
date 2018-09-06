<?php
require_once  $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
class File
{
    public function loadProfilePicture($File){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"].'/images/';
        $image = $uploaddir . basename($File['avatar']['name']);
        move_uploaded_file($File['avatar']['tmp_name'], $image);
        return $imageData = array('name'=>$File['avatar']['name'],'path'=>($image));
}
}