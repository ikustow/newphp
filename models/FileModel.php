<?php

class FileModel extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    public $table = "files";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
 }
    public static function loadProfilePicture($File){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"].'/images/';
        $image = $uploaddir . basename($File['avatar']['name']);
        move_uploaded_file($File['avatar']['tmp_name'], $image);
        return $imageData = array('name'=>$File['avatar']['name'],'path'=>($image));
}
    public static function loadContentPicture($File){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"].'/images/';
        $image = $uploaddir . basename($File['picture']['name']);
        move_uploaded_file($File['picture']['tmp_name'], $image);
        return $imageData = array('name'=>$File['picture']['name'],'path'=>($image));
    }

    public static function findUserPictures($id)
    {
        return  self::Query()->Where("userid", '=', $id)->get()->toArray();
    }
}