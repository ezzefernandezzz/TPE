<?php

class UserModel{

    private $db;
    function __construct(){
         $this->db = new PDO('mysql:host=localhost;'.'dbname=db_peliculas;charset=utf8', 'root', '');
    }

    function getUser($usuario){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombreUsuario = ?');
        $query->execute([$usuario]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function guardarUser($userName, $userPassword){
        //Guardo el nuevo usuario en la base de datos
        $db = new PDO('mysql:host=localhost;'.'dbname=db_peliculas;charset=utf8', 'root', '');
        $query = $db->prepare('INSERT INTO usuarios (nombreUsuario, password) VALUES (? , ?)');
        $query->execute([$userName,$userPassword]);
        //header('Location:'. BASE_URL . 'registrarse/ok'); 
    }

}