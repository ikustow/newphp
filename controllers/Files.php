<?php
require_once  $_SERVER["DOCUMENT_ROOT"]."/models/File.php";
require_once  $_SERVER["DOCUMENT_ROOT"]."/models/User.php";
require_once 'databaseFunc.php';

class Files extends File
{
public function loadAvatar(){
    $avatar = new File;
    $pictureData = $avatar->loadProfilePicture($_FILES);
    loadInfoInUserDataBase($pictureData,$_POST);

    $user = User::findUserbyID($_POST['userid']);
    $pictures = File::findUserPictures($user[0]['id']);

    if (!empty($user[0])) {
        $view = new \View();
        $view->render('userpage.html', ['user' => $user[0], 'pictures' => $pictures]);
    } else {
        $view = new \View();
        $view->render('infopage.html',$data=array());
    }
}
    public function loadPicture(){
        $picture = new File;
        $pictureData = $picture->loadContentPicture($_FILES);
        loadInfoInFilesDataBase($pictureData,$_POST);
        $user = User::findUserbyID($_POST['userid']);
        $pictures = File::findUserPictures($user[0]['id']);
        openAdminPanel();
        if (!empty($user[0])) {
            $view = new \View();
            $view->render('userpage.html', ['user' => $user[0], 'pictures' => $pictures]);

        } else {
            $view = new \View();
            $view->render('infopage.html',$data=array());
        }
    }
}
