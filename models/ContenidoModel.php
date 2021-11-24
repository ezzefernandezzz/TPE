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

    function fetchTablaContenido($offset){
        $query = $this->db->prepare("SELECT * FROM contenido LIMIT 5 OFFSET $offset");
        $query->execute();
        $tabla = $query->fetchAll(PDO::FETCH_OBJ);
        return $tabla;
    }

    function fetchContenidoFiltrado($filtro, $busqueda){
        $query = $this->db->prepare("SELECT * FROM contenido WHERE $filtro LIKE ?");
        $query->execute(array($busqueda));
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
        $cantCaps, $cantTemps, $anio, $imagen = null) 
    {
        $pathImg = null;
        if ($imagen)
            $pathImg = $this->uploadImage($imagen);

        $query = $this->db->prepare("INSERT INTO contenido(nombreContenido, descripcion, actores,
            id_genero, cantidadCapitulos, cantidadTemporadas, anio, imagen) VALUES(?,?,?,?,?,?,?,?)");
        $query->execute(array($nombre, $descripcion, $actores, $id_genero, $cantCaps, $cantTemps, $anio, $pathImg));
        header('Location:'. BASE_URL . 'adminContenido');         
    }

    private function uploadImage($image){
        $target = 'img/imagenes-contenido/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }


    //ADMIN
    function modificarContenido($id, $nombre, $descripcion, $actores, $id_genero,
        $cantCaps, $cantTemps, $anio, $imagen) 
    {
        $pathImg = null;
        if ($imagen)
            $pathImg = $this->uploadImage($imagen);
        $query = $this->db->prepare("UPDATE contenido SET nombreContenido = ?, descripcion = ?, 
            actores = ?, id_genero = ?, cantidadCapitulos = ?, cantidadTemporadas = ?, anio = ?, imagen = ? WHERE id_contenido = ?");
        $query->execute(array($nombre, $descripcion, $actores, $id_genero, $cantCaps, $cantTemps, $anio, $pathImg, $id));
        header('Location:'. BASE_URL . 'adminContenido');         
    }

    //ADMIN
    function eliminarContenido($id_contenido) {
        $query = $this->db->prepare("DELETE FROM contenido WHERE id_contenido = ?");
        $query->execute([$id_contenido]);
        header('Location:'. BASE_URL . 'adminContenido');
    }

    
}