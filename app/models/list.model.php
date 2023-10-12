<?php

class ListModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_pc;charset=utf8', 'root', '');
    }

    function getItems() {
        $consulta = $this->db->prepare('SELECT * FROM pc');
        $consulta->execute();
        $items = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $items;
    }
}