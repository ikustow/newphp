<?php
require_once  $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
require_once  $_SERVER["DOCUMENT_ROOT"]."/vendor/Illuminate/Database/Eloquent/Model.php";

function loadInfoInDataBase($picInfo, $userInfo){
 $user = User::query()->find($userInfo['userid']);
 $user->avatar = $picInfo['name'];
 $user->avatarURL = $picInfo['path'];
 $user->save();
}