<?php

class Users
{

    public function store()
    {
        if (isset($_POST['reg'])) {
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $age = $_POST['age'];
            $info = $_POST['info'];


            $user = new UserModel();
            $user->name = $name;
            $user->login = $login;
            $user->password = $password;
            $user->age = $age;
            $user->info = $info;

            $user->save();
            $user = UserModel::findCurrentUser($login, $password);
            $view = new \View();
            $view->render('userpage.html', ['user' => $user[0]]);
        }
        if (isset($_POST['create'])) {
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $age = $_POST['age'];
            $info = $_POST['info'];


            $user = new UserModel();
            $user->name = $name;
            $user->login = $login;
            $user->password = $password;
            $user->age = $age;
            $user->info = $info;

            $user->save();
            Admin::openAdminPanel();
        }
    }

    public function reg()
    {
        $view = new \View();
        $view->render('registration.html', array());
    }

    public function finduser()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        if ($login=="admin"&&$password=="admin"){
          Admin::openAdminPanel();
        } else {
            $user = UserModel::findCurrentUser($login, $password);
            $pictures = FileModel::findUserPictures($user[0]['id']);

            if (!empty($user[0])) {
                $view = new \View();
                $view->render('userpage.html', ['user' => $user[0], 'pictures' => $pictures]);

            } else {
                $view = new \View();
                $view->render('infopage.html', array());
            }
        }
        }

}