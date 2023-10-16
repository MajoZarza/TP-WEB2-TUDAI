<?php

require_once './config.php';

class itemModel {

    private $db;

    function __construct() {
        $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
            
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

    public function getCategory($id_category) {
        $query = $this->db->prepare('SELECT gama FROM categoria WHERE id_categoria = ?');
        $query->execute([$id_category]);
        $category = $query->fetch(PDO::FETCH_OBJ);
        return $category;
    }

    public function getItemsName() {
        $query = $this->db->prepare('SELECT nombre FROM pc');
        $query->execute();
        $itemsName = $query->fetchAll(PDO::FETCH_OBJ);
        return $itemsName;
    }

    public function deleteItem($id) {
        $query = $this->db->prepare('DELETE FROM pc WHERE id = ?');
        $query->execute([$id]);
    
    }

    public function updateItem($id, $name, $cpu, $gpu, $motherboard, $storage, $ram, $category, $image) {    
        $query = $this->db->prepare('UPDATE pc SET 
        id_categoria = ?,
        nombre = ?,
        procesador = ?,
        grafica = ?,
        mother = ?,
        disco = ?,
        ram = ?,
        imagen = ?
        WHERE id = ?');

        $query->execute([$category, $name, $cpu, $gpu, $motherboard, $storage, $ram, $image, $id]);
    }


    public function newItem($name, $cpu, $gpu, $motherboard, $storage, $ram, $category, $image) {
        $query = $this->db->prepare('INSERT INTO pc 
        (id, id_categoria, nombre, procesador, grafica, mother, disco, ram, imagen)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');

        $id = $this->db->lastInsertId();

        $query->execute([$id, $category, $name, $cpu, $gpu, $motherboard, $storage, $ram, $image]);
    }
}