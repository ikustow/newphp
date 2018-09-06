<?php
require_once  $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
require_once  $_SERVER["DOCUMENT_ROOT"]."/models/User.php";
require_once  $_SERVER["DOCUMENT_ROOT"]."/models/File.php";
require_once 'databaseFunc.php';

class Admin
{
  public function getFiles(){
      if (!empty($_POST['userid'])){ //выводим по id
          $data = File::query()->newQuery()->where("userid", '=', $_POST['userid'])
              ->join('users', 'users.id', '=', 'files.userid')
              ->get(array('files.*', 'users.name'))->toArray();
          $view = new \View();
          $view->render('admin.html', ['data' => $data]);

      }else {
          $data = File::query()->newQuery()
              ->join('users', 'users.id', '=', 'files.userid')
              ->get(array('files.*', 'users.name'))->toArray();
          print_r($data);

          $view = new \View();
          $view->render('admin.html', ['data' => $data]);
      }
  }

  public function getUsers(){
      $users = User::all()->toArray();
      $view = new \View();
      $view->render('admin.html', ['users' => $users]);
  }
    public function sortbyASC(){
        $users = User::all()->sortBy('age')->toArray();
        $view = new \View();
        $view->render('admin.html', ['users' => $users]);
    }
    public function sortByDesc(){
        $users = User::all()->sortByDesc('age')->toArray();
        $view = new \View();
        $view->render('admin.html', ['users' => $users]);
    }
}


