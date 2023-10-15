<?php 

class itemView {
    private $isAdmin;

    function __construct($isAdmin) {
        $this->isAdmin = $isAdmin;
    }
    
    public function showItem($item) {
        require 'templates/singleItem.phtml';
    }

    public function showItems($items) {
        require 'templates/list.phtml';
    }

    /*En caso de haber un error en los datos ingresados al form se le podra pasar el mismo por parametro a la funcion para 
    que se lo muestre al usuario. En caso contrario el error será null(de manera default) y no se enseñara nada*/
    public function showNewItemForm($error = null) {
        require './templates/NewItemForm.phtml';
    }

    public function showIdForm($error = null) {
        $url = "select_id/editar";
        require './templates/idForm.phtml';
    }

    public function showUpdateItemForm($error, $name, $cpu, $gpu, $motherboard, $storage, $ram, $category, $image) {
        require './templates/updateItemForm.phtml';
    }
}
