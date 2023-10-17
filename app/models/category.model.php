<?php


class CategoryModel{

    private$db;

    function __construct() {

        $this->db = new PDO('mysql:host=localhost;dbname=tpe_pc;charset=utf8', 'root', '');
    }

    public function getAllCategories(){
        //abro la coneccion a la db(en el constructor)
        //escribo la sentencia sql y luego la ejecuto
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();

        //con fechtAll traigo los resultados en un arreglo
        $categories = $query->fetchAll(PDO::FETCH_OBJ); 

        return $categories;

    }

    public function getCategory($id){

        $query = $this->db->prepare("SELECT * FROM categorias WHERE id = ?");
        $query->execute([$id]);

        $category = $query->fetch(PDO::FETCH_OBJ);
        return $category;


    }

    public function insertCategory($categoriaNueva){

        $query = $this->db->prepare('INSERT INTO categorias (categoria) VALUES (?)');
        $query->execute([$categoriaNueva]);

        return $this->db->lastInsertId();
      
    }

    function deleteCategoryById($categoriaNueva, $id){

        $query = $this->db->prepare('DELETE FROM categorias WHERE id = ?');
        $query->execute([$id]);

        header("Location: ". BASE_URL);


    }

    function updateCategoryById($categoriaNueva, $id){

        $query = $this->db->prepare('UPDATE categorias SET categoria = ?');
        $query->execute([$categoriaNueva, $id]);

        header("Location: ". BASE_URL. "admin");

    }



}