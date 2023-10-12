<?php

require_once './app/models/list.model.php';
require_once './app/views/list.view.php';


class ListController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new ListModel();
        $isAdmin = AuthHelper::isAdmin();
        $this->view = new ListView($isAdmin);
    }

    public function showItems() {
        $items = $this->model->getItems();

        usort($items, function($a, $b) {
            return $a->id_categoria - $b->id_categoria;
        });
        
        $this->view->showItems($items);
    }
}