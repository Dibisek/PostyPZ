<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
// require_once 'src/controllers/PostController.php';
require_once 'src/controllers/UserController.php';
// require_once 'src/controllers/BookmarkController.php';
require_once 'src/controllers/ErrorController.php';

class Routing
{

    public static $routes;

    public static function get($url, $view)
    {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view)
    {
        self::$routes[$url] = $view;
    }

    public static function run($url)
    {

        $urlParts = explode("/", $url);
        $action = $urlParts[0];

        if (!array_key_exists($action, self::$routes)) {
            ErrorController::getInstance()->error();
            return;
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';

        
        $id = $urlParts[1] ?? '';

        $object->$action($id);
    }
}