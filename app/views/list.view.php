<?php

class ListView {
    private $isAdmin;

    function __construct($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    public function showItems($items) {
        require 'templates/list.phtml';
    }
}