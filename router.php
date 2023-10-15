<?php

/*
                    home    ->      listController->showItems()
*/

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
        $controller = new itemController();
        $controller->showItems();
        break;
    case 'modelo':
        if (isset($params[1])) {
            $controller = new itemController();
            $id = $params[1];
            $controller->showItem($id);
        }
        break;
    case 'login':
        $controller = new authController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new authController();
        $controller->auth();
        break;
    case 'agregar':
        $controller = new itemController();
        $controller->ShowNewItemForm();
        break;
    case 'select_id':
        //select_id/editar/2
        //select_id/eliminar/11
        if (isset($params[2])) {
            var_dump($params[2]);
            if (isset($params[1])) {
                switch($parames[1]) {
                    case 'editar':
                        $controller = new itemController();
                        $controller->showUpdateItemForm();
                        break;
                }
            }
        } else {
            $controller = new itemController();
            $controller->showIdForm();
        }
        break;
/*    case 'editar':
        $controller = new itemController();
        $controller->showUpdateItemForm();
        break;*/
    case 'eliminar':
        break;
}

//control