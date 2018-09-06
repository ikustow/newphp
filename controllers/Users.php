<?php
require_once "C:\OSPanel\domains\mvc\models\User.php";

class Users extends User
{
    public function store()
    {
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $info = $_POST['info'];
        $avatar = $_POST['avatar'];
        print_r($_POST);

        $user = new User();
        $user->name = $name;
        $user->login = $login;
        $user->password = $password;
        $user->age = $age;
        $user->info = $info;
        $user->avatar = $avatar;
        $user->save();
        $user = json_decode($user);
        print_r($user);
        $view = new \View();
        $view->render('userpage.html', [ 'user' => $_POST ]);
    }

    public function create()
    {
        $view = new \View();
        $view->render('registration.html',$data=array());
    }

    public function finduser()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $login = array($login);
        $user = User::findCurrentUser($login, $password);
        print_r($user);
        if (!empty($user)) {
            $view = new \View();
            $view->render('userpage.html', json_decode($user));
        } else {
            $view = new \View();
            $view->render('infopage.html',$data=array());
        }
    }
}