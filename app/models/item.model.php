<?php

class itemModel {

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_pc;charset=utf8', 'root', '');
    }

    public function getItemInfo($id) {
        $query = $this->db->prepare('SELECT * FROM pc WHERE id = ?');
        $query->execute([$id]);
        $item = $query->fetch(PDO::FETCH_OBJ);
        return $item;
    }

    public function getItems() {
        $query = $this->db->prepare('SELECT * FROM pc');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_OBJ);
        return $items;
    }

    public function getItemsName() {
        $query = $this->db->prepare('SELECT nombre FROM pc');
        $query->execute();
        $itemsName = $query->fetchAll(PDO::FETCH_OBJ);
        return $itemsName;
    }
}