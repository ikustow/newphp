<?php

class Admin
{
    public function getFiles()
    {
        $view = new \View();
        if (!empty($_POST['userid'])) { //выводим по id
            $files = FileModel::query()->newQuery()->where("userid", '=', $_POST['userid'])
                ->join('users', 'users.id', '=', 'files.userid')
                ->get(array('files.*', 'users.name'))->toArray();
        } else {
            $files = FileModel::query()->newQuery()
                ->join('users', 'users.id', '=', 'files.userid')
                ->get(array('files.*', 'users.name'))->toArray();
        }
        $view->render('admin.html', ['files' => $files]);
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
        $users = UserModel::all()->toArray();
        $view = new \View();
        $view->render('admin.html', ['users' => $users]);
    }

    public static function editUsers()
    {

        if (!empty($_POST['ID'])) {
            if (isset($_POST['change'])) {
                $usersdata = UserModel::query()->newQuery()->where("id", '=', $_POST['ID'])->get()->toArray();
                $view = new \View();
                $view->render('adminEditUsers.html', ['users' => $usersdata]);
            }
        }
        if (isset($_POST['delete'])) {
            UserModel::destroy($_POST['ID']);
            echo "Пользователь удален";
            self::openAdminPanel();
        }
        if (isset($_POST['create'])) {
            $view = new \View();
            $view->render('create.html', array());
        }
    }

    public static function EditUser()
    {

        $user = UserModel::query()->find($_POST['userid']);
        $user->name = $_POST['name'];
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        $user->age = $_POST['age'];
        $user->info = $_POST['info'];
        $user->avatarURL = $_POST['avatarURL'];
        $user->save();
        echo "Данные пользователя изменены!";
        self::openAdminPanel();
    }
}