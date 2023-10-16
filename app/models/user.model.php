<?php

require_once './config.php';

class userModel {
    private $db;

    function __construct() {
        $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }

    public function getByUsername($username) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE usuario = ?');
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}