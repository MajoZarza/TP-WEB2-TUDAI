<?php


class CategoryView{

    public function showCategories($categories){
        
        $count = count($categories);

        require 'templates/categoriesList.phtml';



    }

    public function showError($error){

        require 'templates/error.phtml';
    }    





}