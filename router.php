<?php

/*
                    home    ->      listController->showItems()
*/

require_once 'app/controllers/list.controller.php';
require_once 'app/controllers/item.controller.php';
require_once 'app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);


switch($params[0]) {
    case 'home':
        $controller = new ListController();
        $controller->showItems();
        break;
    case 'modelo':
        if (isset($params[1])) {
            $id = $params[1];
            $controller = new itemController($id);
            $controller->showItem();
        }
        break;
    case 'login':
        $controller = new authController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break; 
    
}