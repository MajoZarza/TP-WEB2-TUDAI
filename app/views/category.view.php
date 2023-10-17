<?php


class CategoryView{

    private $isAdmin;

    public function __construct($isAdmin)
    {
        $this->isAdmin = $isAdmin;
        
    }
    public function showCategories($categories){
        
        require 'templates/category.phtml';

    }

   



}