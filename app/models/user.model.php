<?php

class userModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_pc;charset=utf8', 'root', '');
    }

    public function getByUsername($username) {
        $consulta = $this->db->prepare('SELECT * FROM usuario WHERE usuario = ?');
        $consulta->execute([$username]);
        return $consulta->fetch(PDO::FETCH_OBJ);
    }
}