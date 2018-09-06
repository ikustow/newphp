<?php

require_once "vendor/autoload.php";
require_once "config.php";
require_once "core/Views.php";
require_once "core/MainContoller.php";
//require_once "views/users/Views.php";
require_once "controllers/Users.php";
require_once "controllers/Main.php";

$routes = explode('/', $_SERVER['REQUEST_URI']);


$controller_name = "Main";
$action_name = 'index';
echo $routes[count($routes)-2];
if ($routes[count($routes)-2] == "Users") {
    $controller_name = $routes[count($routes)-2];
    $action_name = $routes[count($routes)-1];
} else {
    $controller_name = "Main";
    $action_name = 'index';
}

echo $controller_name . "    " . $action_name;
$filename = "controllers/" . $controller_name . ".php";


if (file_exists($filename)) {
    require_once $filename;
} else {
    echo("File not found");
}
$classname = '\App\\' . ucfirst($controller_name);
if (class_exists($classname)) {
    $controller = new $classname();
} else {
    echo("File found but class not found");
}


if (method_exists($controller, $action_name)) {
    $controller->$action_name();
} else {
       echo("Method not found");
}