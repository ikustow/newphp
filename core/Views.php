<?php

class View
{
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new Twig_Loader_Filesystem('views/users');
        $this->twig = new Twig_Environment($this->loader, ['cache' => false,]);
    }

    public function render($filename, $data = array())
    {
         extract($data);
      //  require_once __DIR__."/../views/".$filename.".php";
         require_once  $filename;
       //  $this->twig->render($filename, $data);
    }
}
