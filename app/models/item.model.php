<?php

class itemModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_pc;charset=utf8', 'root', '');
    }

    public function getItemInfo($id) {
        $consulta = $this->db->prepare('SELECT * FROM pc WHERE id = ?');
        $consulta->execute([$id]);
        $item = $consulta->fetch(PDO::FETCH_OBJ);
        return $item;
    }
}