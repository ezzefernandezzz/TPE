<?php

include_once "./models/ComentarioModel.php";
include_once "./views/ApiView.php";

class ApiComentarioController {

    private $apiView;
    private $model;

    function __construct() {
        $this->apiView = new ApiView();
        $this->model = new ComentarioModel();
        $this->data = file_get_contents("php://input");
    }

    function obtenerComentarios($params = null) {
        $id_contenido = $params[':ID'];
        if(isset($params[':ORDERBY']) && isset($params[':ORDEN'])){
            $ordenadoPor = $params[':ORDERBY'];
            if ($ordenadoPor == 'antiguedad')
                $ordenadoPor = 'id_comentario';
            else
                $ordenadoPor = 'puntuacion';
            $orden = $params[':ORDEN'];
            if ($orden == 'ascendente')
                $orden = 'ASC';
            else {
                $orden = 'DESC';
            }
            $comentarios = $this->model->getComentariosOrdenados($id_contenido, $ordenadoPor, $orden);
        } else if(isset($params[':PUNTAJE'])) { 
            $puntaje = $params[':PUNTAJE'];
            $comentarios = $this->model->filtrarComentariosPuntaje($id_contenido, $puntaje);
        }
        else
            $comentarios = $this->model->getComentariosContenido($id_contenido);
        if ($comentarios) {
            return $this->apiView->response($comentarios, 200);
        } else
            return $this->apiView->response([], 204);
    }

    function insertarComentario($params = null) {
        $comentario = $this->getBody();
        $this->model->agregarComentario($comentario->texto, $comentario->puntaje, $comentario->id_contenido, $comentario->id_usuario);
        return $this->apiView->response($comentario, 200);
    }

    function eliminarComentario($params = null) {
        $id_comentario = $params[':ID'];
        $this->model->borrarComentario($id_comentario);
        return $this->apiView->response("Comentario borrado.", 200);
        
    }

    function getBody() {
        return json_decode($this->data);
    }

}