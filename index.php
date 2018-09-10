<?php

require_once "vendor/autoload.php";
require_once "config.php";
require_once "core/View.php";
require_once "core/MainContoller.php";
require_once "controllers/Users.php";
require_once "controllers/Main.php";
require_once "models/FileModel.php";
require_once "models/UserModel.php";
require_once "controllers/Admin.php";

$routes = explode('/', $_SERVER['REQUEST_URI']);

$controller_name = "Main"; //
$action_name = 'index';

if (!empty($routes[count($routes)-2])) {
    $controller_name = $routes[count($routes)-2];
    $action_name = $routes[count($routes)-1];
}
else {
    $controller_name ="Main";
    $action_name = 'index';
}

$filename = $_SERVER["DOCUMENT_ROOT"]."/controllers/" . $controller_name . ".php";
try {

    if (file_exists($filename)) {
        require_once $filename;
    } else {
        throw new Exception("FileModel not found");
    }
    $classname = ucfirst($controller_name);
    if (class_exists($classname)) {
        $controller = new $classname();
    } else {
        throw new Exception("FileModel found but class not found");
    }

    if (method_exists($controller, $action_name)) {
        $controller->$action_name();
    } else {
        throw new Exception("Method not found");
    }
} catch
(Exception $e) {
    require "errors/404.php";
}
