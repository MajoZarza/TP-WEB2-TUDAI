<?php

require_once './app/models/list.model.php';
require_once './app/views/list.view.php';


class ListController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ListModel();
        $this->view = new ListView();
    }

    public function showItems() {
        $items = $this->model->getItems();

        $this->view->showItems($items);
    }
}