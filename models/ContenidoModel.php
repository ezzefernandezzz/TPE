<?php
class ContenidoModel{

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_peliculas;charset=utf8', 'root', ''); 
    }

    //Se puede usar para traer los generos
    function fetchTabla($tabla){
        $query = $this->db->prepare("SELECT * FROM $tabla ");
        $query->execute();
        $tabla = $query->fetchAll(PDO::FETCH_OBJ);
        return $tabla;
    }

    function fetchTablas() {
        $query = $this->db->prepare("SELECT contenido.*, genero.nombreGenero FROM contenido 
            INNER JOIN genero ON contenido.id_genero = genero.id_genero");
        //select item.*,categoria.nombre from item inner join categoria on item.id_categoria = categoria.id_categoria where item.id_categoria = 1
        $query->execute();
        $tabla = $query->fetchAll(PDO::FETCH_OBJ);
        return $tabla;
    }

    function fetchPorGenero($id_genero) {
        $query = $this->db->prepare("SELECT * FROM contenido WHERE id_genero = ?");
        $query->execute([$id_genero]);
        $genero = $query->fetchAll(PDO::FETCH_OBJ);
        return $genero;
    }

    function fetchPorIdContenido($id_contenido) {
        $query = $this->db->prepare("SELECT contenido.*, genero.nombreGenero FROM contenido 
        INNER JOIN genero ON contenido.id_genero = genero.id_genero WHERE contenido.id_contenido = ?");
        $query->execute([$id_contenido]);
        $contenido = $query->fetch(PDO::FETCH_OBJ);
        return $contenido;
    }

    //ADMIN
    function agregarContenido($nombre, $descripcion, $actores, $id_genero,
        $cantCaps, $cantTemps, $anio) 
    {
        $query = $this->db->prepare("INSERT INTO contenido(nombreContenido, descripcion, actores,
            id_genero, cantidadCapitulos, cantidadTemporadas, anio) VALUES(?,?,?,?,?,?,?)");
        $query->execute(array($nombre, $descripcion, $actores, $id_genero, $cantCaps, $cantTemps, $anio));
        header('Location:'. BASE_URL . 'adminContenido');         
    }

    //ADMIN
    function modificarContenido($id, $nombre, $descripcion, $actores, $id_genero,
        $cantCaps, $cantTemps, $anio) 
    {
        $query = $this->db->prepare("UPDATE contenido SET nombreContenido = ?, descripcion = ?, 
            actores = ?, id_genero = ?, cantidadCapitulos = ?, cantidadTemporadas = ?, anio = ? WHERE id_contenido = ?");
        $query->execute(array($nombre, $descripcion, $actores, $id_genero, $cantCaps, $cantTemps, $anio, $id));
        header('Location:'. BASE_URL . 'adminContenido');         
    }

    //ADMIN
    function eliminarContenido($id_contenido) {
        $query = $this->db->prepare("DELETE FROM contenido WHERE id_contenido = ?");
        $query->execute([$id_contenido]);
        header('Location:'. BASE_URL . 'adminContenido');
    }

    
}