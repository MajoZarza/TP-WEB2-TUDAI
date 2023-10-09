<?php

/*
                    home    ->      listController->showItems()
*/

require_once './app/controllers/list.controller.php';
require_once './app/controllers/item.controller.php';

//define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

//var_dump($params);

switch($params[0]) {
    case 'home':
        $controller = new ListController();
        $controller->showItems();
        break;
    case 'modelo':
        //echo 'modelo';
        if (isset($params[1])) {
            $id = $params[1];
            $controller = new itemController($id);
            $controller->showItem();
        }
}