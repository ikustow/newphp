<?php
require_once  $_SERVER["DOCUMENT_ROOT"]."/models/File.php";
require_once 'databaseFunc.php';
class Files extends File
{
public function loadavatar(){
    $avatar = new File;
    $pictureData = $avatar->loadProfilePicture($_FILES);
    print_r($_POST);
    loadInfoInDataBase($pictureData,$_POST);
}
}