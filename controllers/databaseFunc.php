<?php
require_once  $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
require_once  $_SERVER["DOCUMENT_ROOT"]."/vendor/Illuminate/Database/Eloquent/Model.php";

function loadInfoInUserDataBase($picInfo, $userInfo){
 $user = User::query()->find($userInfo['userid']);
 $user->avatar = $picInfo['name'];
 $user->avatarURL = $picInfo['path'];
 $user->save();
}


function loadInfoInFilesDataBase($picInfo, $userInfo){
    $user = new File();
    $user->userid = $userInfo['userid'];
    $user->filepath = $picInfo['path'];
    $user->file = $picInfo['name'];
    $user->save();
}