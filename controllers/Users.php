<?php
require_once  $_SERVER["DOCUMENT_ROOT"]."/models/User.php";

class Users extends User
{

    public function store()
    {
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $info = $_POST['info'];


        $user = new User();
        $user->name = $name;
        $user->login = $login;
        $user->password = $password;
        $user->age = $age;
        $user->info = $info;

        $user->save();
        $user = User::findCurrentUser($login, $password);
        $view = new \View();
        $view->render('userpage.html', [ 'user' => $user[0] ]);
    }

    public function reg()
    {
        $view = new \View();
        $view->render('registration.html',$data=array());
    }

    public function finduser()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $user = User::findCurrentUser($login, $password);
        if (!empty($user[0])) {
            $view = new \View();
            $view->render('userpage.html', ['user' => $user[0]]);
       print_r($user[0]);
        } else {
            $view = new \View();
            $view->render('infopage.html',$data=array());
        }
    }
}