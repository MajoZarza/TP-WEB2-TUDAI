<?php

/*
                    home    ->      homeController->listarItems()
*/

require_once './app/controllers/list.controller.php';

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
}