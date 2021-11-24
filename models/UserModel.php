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

    function getUsuarios(){
        $query = $this->db->prepare('SELECT id_usuario, nombreUsuario, administrador FROM usuarios');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function guardarUser($userName, $userPassword){
        $query = $this->db->prepare('INSERT INTO usuarios (nombreUsuario, password) VALUES (? , ?)');
        $query->execute([$userName,$userPassword]);
    }

    function modificarPrivilegios($rol, $id_usuario) {
        $query = $this->db->prepare('UPDATE usuarios SET administrador = ? WHERE id_usuario = ?');
        $query->execute(array($rol, $id_usuario));
        header('Location:'. BASE_URL . 'adminUsuarios');
    }

    function eliminarUsuario($id_usuario) {
        $query = $this->db->prepare('DELETE FROM usuarios WHERE id_usuario = ?');
        $query->execute([$id_usuario]);
        header('Location:'. BASE_URL . 'adminUsuarios');
    }

}