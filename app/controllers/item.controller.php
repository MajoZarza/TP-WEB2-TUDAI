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
        $item = $this->model->getItemInfo($id);
        $this->view->showItem($item);
    }

    public function showItems() {
        $items = $this->model->getItems();

        usort($items, function($a, $b) {
            return $a->id_categoria - $b->id_categoria;
        });
        
        $this->view->showItems($items);
    }

    public function showNewItemForm() {
        $this->view->showNewItemForm();
    }

    public function showIdForm() {
        $this->view->showIdForm();
    }

    public function showUpdateItemForm() {

        $id = $_GET['id'];

        if (empty($id)) {
            $this->view->showIdForm("Ingrese el id");
            return;
        }

        //obtenemos el item en forma objeto con cada una de sus columnas representando una propiedad
        $pc = $this->model->getItemInfo($id);

        $name = $pc->nombre;
        $cpu = $pc->procesador;
        $gpu = $pc->grafica;
        $motherboard = $pc->mother;
        $storage = $pc->disco;
        $ram = $pc->ram;
        $category = $pc->id_categoria;
        $image = $pc->imagen;

        $this->view->showUpdateItemForm(null, $name, $cpu, $gpu, $motherboard, $storage, $ram, $category, $image);
    }
}