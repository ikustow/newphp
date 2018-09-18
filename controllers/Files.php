<?php

class Files
{
public function loadAvatar(){
    $avatar = new FileModel;
    $pictureData = $avatar->loadProfilePicture($_FILES);
    $this->loadInfoUserInDataBase($pictureData,$_POST);

    $user = UserModel::findUserbyID($_POST['userid']);
    $pictures = FileModel::findUserPictures($user[0]['id']);

    if (!empty($user[0])) {
        $view = new \View();
        $view->render('userpage.html', ['user' => $user[0], 'pictures' => $pictures]);
    } else {
        $view = new \View();
        $view->render('infopage.html', array());
    }
}
    public function loadPicture(){
        $picture = new FileModel;
        $pictureData = $picture->loadContentPicture($_FILES);
        $this->loadInfoFilesInDataBase($pictureData,$_POST);
        $user = UserModel::findUserbyID($_POST['userid']);
        if (!empty($user[0])) {
            $view = new \View();
            $pictures = FileModel::findUserPictures($user[0]['id']);
            $view->render('userpage.html', ['user' => $user[0], 'pictures' => $pictures]);
        } else {
            $view = new \View();
            $view->render('infopage.html', array());
        }
    }
   public function loadInfoFilesInDataBase($picInfo, $userInfo){
        $user = new FileModel();
        $user->userid = $userInfo['userid'];
        $user->filepath = $picInfo['path'];
        $user->file = $picInfo['name'];
        $user->save();
    }


   public function loadInfoUserInDataBase($picInfo, $userInfo){
        $user = UserModel::query()->find($userInfo['userid']);
        $user->avatar = $picInfo['name'];
        $user->avatarURL = $picInfo['path'];
        $user->save();
    }

}
