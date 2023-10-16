<?php

require_once './app/models/item.model.php';
require_once './app/views/item.view.php';

class itemController {

    private $model;
    private $view;


    function __construct() {
        $this->model = new itemModel();
        $isAdmin = AuthHelper::isAdmin();
        $this->view = new itemView($isAdmin);
    }


    public function showItem($id) {
        //muestra toda la info relacionada a un item.
        $item = $this->model->getItemInfo($id);
        $category = $this->model->getCategory($item->id_categoria);
        $this->view->showItem($item, $category);
    }


    public function showItems() {
        //muestra todos los items cargados en la db en el home.
        $items = $this->model->getItems();

        //compara la propiedad "id_Categoria" de cada objeto del arreglo y a traves de la funcion anonima evalua cual es menor o  mayor para asi ordenarlos dentro del arreglo
        usort($items, function($a, $b) {
            return $a->id_categoria - $b->id_categoria;
        });

        foreach ($items as $item) {
            $category = $this->model->getCategory($item->id_categoria);
            $item->gama = $category->gama;
        }

        //$category = $this->model->getCategory($item->id_categoria);
        
        $this->view->showItems($items);
    }


    public function showNewItemForm() {
        //Muestra el form para ingresar un nuevo item
        AuthHelper::verify();
        $this->view->showNewItemForm();
    }


    public function procesarAgregar() {
        //Procesa los datos ingresador al form que se encarga de agregar un nuevo item
        $name = $_POST['name'];
        $cpu = $_POST['cpu'];
        $gpu = $_POST['gpu'];
        $motherboard = $_POST['motherboard'];
        $storage = $_POST['storage'];
        $ram = $_POST['ram'];
        $category = $_POST['category'];
        $image = $_POST['img'];

        if (empty($name) || empty($cpu) || empty($gpu) || empty($motherboard) || empty($storage) || empty($ram) || empty($category) || empty($image)) {
            $this->view->showNewItemForm("Revise que todos los campos tengan datos correctos y no esten vacios");
        }

        $this->model->newItem($name, $cpu, $gpu, $motherboard, $storage, $ram, $category, $image);

        header('Location: ' . BASE_URL);
    }



    public function showIdFormEdit() {
        //llama a la funcion de la vista que muestra el form para ingresar el id del item que se quiere editar.
        AuthHelper::verify();
        $this->view->showIdFormEdit();
    }



    public function showUpdateItemForm() {
        //toma el id del item que se quiere actualizar para mostrar un form con todos los datos precargados del mismo y que a partir de ahi se pueda modificar el que se quiera.
        AuthHelper::verify();
        $id = $_GET['id'];

        if (empty($id)) {
            $this->view->showIdFormEdit("Ingrese el id");
            return;
        }

        //obtenemos el item en forma de objeto con cada una de sus columnas representando una propiedad
        $pc = $this->model->getItemInfo($id);

        $name = $pc->nombre;
        $cpu = $pc->procesador;
        $gpu = $pc->grafica;
        $motherboard = $pc->mother;
        $storage = $pc->disco;
        $ram = $pc->ram;
        $category = $pc->id_categoria;
        $image = $pc->imagen;

        $this->view->showUpdateItemForm(null, $id, $name, $cpu, $gpu, $motherboard, $storage, $ram, $category, $image);
    }


    public function showIdFormDelete() {
        //llama a la funcion de la vista que muestra el form para ingresar el id del item que se quiere borrar.
        AuthHelper::verify();
        $this->view->showIdFormDelete();
    }


    public function editItem() {
        //obtiene todos los datos ingresados en el form y con eso actualiza cada componente de la pc seleccionada.
        $id = $_POST['id'];
        $name = $_POST['name'];
        $cpu = $_POST['cpu'];
        $gpu = $_POST['gpu'];
        $motherboard = $_POST['motherboard'];
        $storage = $_POST['storage'];
        $ram = $_POST['ram'];
        $category = $_POST['category'];
        $image = $_POST['img'];

        if(empty($name) || empty($cpu) || empty($gpu) || empty($motherboard) || empty($storage) || empty($ram) || empty($category) || empty($image)) {
            $this->view->showUpdateItemForm("Revise que todos los campos tengan datos correctos y no esten vacios", $id, $name, $cpu, $gpu, $motherboard, $storage, $ram, $category, $image);
            return;
        }

        $this->model->updateItem($id, $name, $cpu, $gpu, $motherboard, $storage, $ram, $category, $image);
        header('Location: ' . BASE_URL);
    }


    public function deleteItem() {
        //llama al modelo para que se encargue de eliminar el item seleccionado
        $id = $_GET['id'];
        $this->model->deleteItem($id);
        header('Location: ' . BASE_URL);
    }


    public function showErrorPage() {
        $this->view->showErrorPage();
    }

}