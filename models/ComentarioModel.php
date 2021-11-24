<?php

class ComentarioModel {

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_peliculas;charset=utf8', 'root', '');
    }

    function getComentariosContenido($id_contenido) {
        $query = $this->db->prepare("SELECT comentarios.id_comentario, comentarios.comentario, comentarios.puntuacion, usuarios.nombreUsuario
                     FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario WHERE comentarios.id_contenido = ?");
        $query->execute([$id_contenido]);
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function getComentariosOrdenados($id_contenido, $filtro, $orden) {
        $query = $this->db->prepare("SELECT comentarios.id_comentario, comentarios.comentario, comentarios.puntuacion, usuarios.nombreUsuario
        FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario WHERE comentarios.id_contenido = ? ORDER BY $filtro $orden");
        $query->execute(array($id_contenido));//$filtro, $orden));
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function filtrarComentariosPuntaje($id_contenido, $puntaje) {
        $query = $this->db->prepare("SELECT comentarios.id_comentario, comentarios.comentario, comentarios.puntuacion, usuarios.nombreUsuario
        FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario WHERE comentarios.id_contenido = ? AND comentarios.puntuacion = ?");
        $query->execute(array($id_contenido, $puntaje));
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function agregarComentario($comentario, $puntuacion, $id_contenido, $id_usuario) {
        $query = $this->db->prepare("INSERT INTO `comentarios`(`comentario`, `puntuacion`, `id_contenido`, `id_usuario`)
                    VALUES (?,?,?,?)");
        $query->execute(array($comentario, $puntuacion, $id_contenido, $id_usuario));
    }

    function borrarComentario($id_comentario) {
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario = ?");
        $query->execute([$id_comentario]);
    }

}