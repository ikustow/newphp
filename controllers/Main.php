<?php

class Main
{
    public function index()
    {
        $view = new \View();
        $view->render('enter.html',$data = array());
    }
}
