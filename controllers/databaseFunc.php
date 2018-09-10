<?php


function loadInfoUserInDataBase($picInfo, $userInfo){
 $user = UserModel::query()->find($userInfo['userid']);
 $user->avatar = $picInfo['name'];
 $user->avatarURL = $picInfo['path'];
 $user->save();
}


function loadInfoFilesInDataBase($picInfo, $userInfo){
    $user = new FileModel();
    $user->userid = $userInfo['userid'];
    $user->filepath = $picInfo['path'];
    $user->file = $picInfo['name'];
    $user->save();
}

