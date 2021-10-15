<?php

class GenerosModel {

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_peliculas;charset=utf8', 'root', '');
    }

    function agregarGenero($nombre, $descripcion) {
        $query = $this->db->prepare("INSERT INTO genero(nombreGenero,descripcion) VALUES (?,?)");
        $query->execute(array($nombre,$descripcion));
        header('Location:'. BASE_URL . 'generos');  
    }

    function fetchGenero($id_genero) {
        $query = $this->db->prepare("SELECT * FROM genero WHERE id_genero = ?");
        $query->execute([$id_genero]);
        $genero = $query->fetch(PDO::FETCH_OBJ);
        return $genero;
    }

    function modificarGenero($id, $nombre, $descripcion) {
        $query = $this->db->prepare("UPDATE genero SET nombreGenero = ?, descripcion = ? WHERE id_genero = ?");
        $query->execute(array($nombre,$descripcion,$id));
        header('Location:'. BASE_URL . 'generos'); 
    }

    function eliminarGenero($id) {
        $query = $this->db->prepare("DELETE FROM genero WHERE id_genero = ?");
        $query->execute([$id]);
        header('Location:'. BASE_URL . 'generos'); 
    }

}