<?php
namespace App;
class Main
{
    public function index()
    {
        $view = new \View();
        $view->render('C:\OSPanel\domains\mvc\views\users\enter.php');
    }
}
