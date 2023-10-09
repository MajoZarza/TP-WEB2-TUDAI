<?php

require_once './app/models/item.model.php';
require_once './app/views/item.view.php';

class itemController {

    private $model;
    private $view;
    private $id;

    public function __construct($id) {
        $this->model = new itemModel();
        $this->view = new itemView();
        $this->id = $id;
    }

    public function showItem() {
        $item = $this->model->getItemInfo($this->id);
        $this->view->showAllInfo($item);
    }
}