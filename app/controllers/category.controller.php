<?php

require_once './app/models/category.model.php';
require_once './app/views/category.view.php';
//require_once './app/models/item.controller.php';

class CategoryController{

/*    private $model;
    private $view;
    private $id;


    function __construct(){

        $this->model = new CategoryModel();
        $this->itemModel = new ItemModel();
        $this->view = new CategoryView();
    }

    function showCategories(){

        session_start();

        $categories = $this->model->getAllCategories();
        $this->view->showCategories($categories);
    }

    function showItemOfCategory($id){

        session_start();

        $itemsByCategory = $this->itemModel->getItemsByCategory($id);
        $this->view->showItems($itemsByCategory);
    }

    function showCategoriesAdmin(){

        $authHelper = new AuthHelper();
        $authHelper->init();//ver si se llama asi

        $categoriaNueva = $_POST[$categoriaNueva];//cambiar a nombre en ingles

        $id = $this->model->insertCategory($categoriaNueva);

        header("Location: admin");


    }


    function deleteCategory($id){

        $authHelper = new AuthHelper();
        $authHelper->init();

        $category = $this-> model ->getCategory($id);
        $this->view->ShowFormEditCategory($category);

    }

    function updateCategory(){

        $authHelper = new AuthHelper();
        $authHelper->init();

        if(!empty($_POST)){
            $id = $_POST['id'];
           // $categoriaNueva = $_POST[$categoriaNueva, $id];
        
        }

    }*/
}









