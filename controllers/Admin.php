<?php

class Admin
{
    public function getFiles()
    {
        if (!empty($_POST['userid'])) { //выводим по id
            $data = FileModel::query()->newQuery()->where("userid", '=', $_POST['userid'])
                ->join('users', 'users.id', '=', 'files.userid')
                ->get(array('files.*', 'users.name'))->toArray();
            $view = new \View();
            $view->render('admin.html', ['info' => $data]);

        } else {
            $data = FileModel::query()->newQuery()
                ->join('users', 'users.id', '=', 'files.userid')
                ->get(array('files.*', 'users.name'))->toArray();

            $view = new \View();
            $view->render('admin.html', ['info' => $data]);
        }
    }

    public function getUsers()
    {
        if ($_POST['sort'] == 'ASC') {
            $users = UserModel::all()->sortBy('age')->toArray();
            $view = new \View();
            $view->render('admin.html', ['users' => $users]);
        } else {
            $users = UserModel::all()->sortByDesc('age')->toArray();
            $view = new \View();
            $view->render('admin.html', ['users' => $users]);
        }
    }

    public static function openAdminPanel()
    {
        $view = new \View();
        $view->render('admin.html', array());
    }

    public static function editUsers()
    {
        if (!empty($_POST['ID'])) {
            $users = UserModel::query()->newQuery()->where("id", '=', $_POST['ID'])->get()->toArray();

            $view = new \View();
            $view->render('adminEditUsers.html',  ['users' => $users]);
        } else {
            $view = new \View();
            $view->render('adminEditUsers.html', array());
        }
    }
    public static function createOrEditUser()
    {
        if ($_POST['type'] == 'edit') {

            $user = UserModel::query()->find( $_POST['userid']);


            $user->name = $_POST['name'];
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            $user->age = $_POST['age'];
            $user->info = $_POST['info'];
            $user->avatarURL = $_POST['avatarURL'];

            $user->save();

            echo "Данные пользователя изменены!";
            self::openAdminPanel();
        } else {
            $checkUser = UserModel::query()->newQuery()->where("login", '=', $_POST['login'])->get()->toArray();
            if (!empty($checkUser)) {
                echo 'Пользователь с данным Email уже зарегестрирован в системе';
                $view = new \View();
                $view->render('adminEditUsers.html',  ['users' => $checkUser]);
            } else{

                $user = new UserModel();

                $user->name = $_POST['name'];
                $user->login = $_POST['login'];
                $user->password = $_POST['password'];
                $user->age = $_POST['age'];
                $user->info = $_POST['info'];
                $user->avatarURL = $_POST['avatarURL'];

                $user->save();
                echo "Пользователь создан в БД";
                self::openAdminPanel();
            }

        }
    }
}