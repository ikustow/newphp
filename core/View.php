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

    public function render($filename, $data)
    {
      echo  $this->twig->render($filename, $data);
    }
}
