<?php
namespace App;
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
        $view->render('C:\OSPanel\domains\mvc\views\users\userpage.php',$_POST);
    }

    public function create()
    {
        $view = new \View();
        $view->render('C:\OSPanel\domains\mvc\views\users\registration.php');
    }

    public function finduser()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = $this->finduser($login, $password);
        print_r($user);
        if (!empty($user)) {
            $view = new \View();
            $view->render('C:\OSPanel\domains\mvc\views\users\userpage.php', $user);
        } else {
            $view = new \View();
            $view->render('C:\OSPanel\domains\mvc\views\users\infopage.php');
        }
    }
}