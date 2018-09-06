<?php
require_once  $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";

class File extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    public $table = "files";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
 }


    public function loadProfilePicture($File){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"].'/images/';
        $image = $uploaddir . basename($File['avatar']['name']);
        move_uploaded_file($File['avatar']['tmp_name'], $image);
        return $imageData = array('name'=>$File['avatar']['name'],'path'=>($image));
}
    public function loadContentPicture($File){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"].'/images/';
        $image = $uploaddir . basename($File['picture']['name']);
        move_uploaded_file($File['picture']['tmp_name'], $image);
        return $imageData = array('name'=>$File['picture']['name'],'path'=>($image));
    }

    public function findUserPictures($id)
    {
        return  self::Query()->Where("userid", '=', $id)->get()->toArray();
    }
}