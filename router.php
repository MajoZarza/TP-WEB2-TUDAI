<?php

require_once 'app/controllers/item.controller.php';
require_once 'app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);


switch($params[0]) {

    //Muestra el home con el listado de items
    case 'home':
        $controller = new itemController();
        $controller->showItems();
        break;

    //Muestra un item en especifico con toda su info
    case 'modelo':
        if (isset($params[1])) {
            $controller = new itemController();
            $id = $params[1];
            $controller->showItem($id);
        }
        break;

    //Muesta el form para que ingrese el usuario
    case 'login':
        $controller = new authController();
        $controller->showLogin();
        break;

    //Procesa los datos ingresado por el usuario en el form de ingreso
    case 'auth':
        $controller = new authController();
        $controller->auth();
        break;

    case 'agregar':
        //Muestra el form para agregar un nuevo item
        $controller = new itemController();
        $controller->ShowNewItemForm();
        break;

    //Procesa los datos ingresados al form para agregar items.
    case 'procesar_agregar':
        $controller = new itemController();
        $controller->procesarAgregar();
        break;

    case 'select_id_editar':
        /*cuando se accede a la url, en caso de que tenga un parametro id, mostrará el form con todos los datos precargados del item 
        cuyo id seleccionamos. En caso de no habersele pasado el id, te llevara al form para que ingreses el mismo.*/
        if (isset($params[1])) {
            $controller = new itemController();
            $controller->showUpdateItemForm();
        } else {
            $controller = new itemController();
            $controller->showIdFormEdit();
        }
        break;

    case 'editar':
        //Procesa los datos ingresados al form para editar items.
        $controller = new itemController();
        $controller->editItem();
        break;

    case 'select_id_eliminar':
        //Muestra un form para ingresar un id del item que queremos eliminar
        $controller = new itemController();
        $controller->showIdFormDelete();
        break;

    case 'eliminar':
        //Procesa los datos ingresados al form para eliminar items.
        $controller = new itemController();
        $controller->deleteItem();
        break;

    default: 
        $controller = new itemController();
        $controller->showErrorPage();
        break;

}