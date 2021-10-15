<?php

include_once "models/GenerosModel.php";
include_once "models/ContenidoModel.php";
include_once "views/AdminView.php";
include_once "helpers/AuthHelper.php";

class AdminController {

    private $contView;
    private $admView;
    private $contModel;
    private $genModel;
    private $auth;

    function __construct() {
        $this->contView = new ContenidoView();
        $this->admView = new AdminView();
        $this->contModel = new ContenidoModel();
        $this->genModel = new GenerosModel();
        $this->auth = new AuthHelper();
    }

    function adminListaContenido(){
        $this->auth->checkLoggedIn();
        $contenido = $this->contModel->fetchTabla("contenido");
        $generos = $this->contModel->fetchTabla("genero");
        $this->admView->renderizarContenidoAdmin($contenido, $generos);
    }

    // ABM Contenido
    function agregarContenido(){
        $this->auth->checkLoggedIn();
        $generos = $this->contModel->fetchTabla("genero");
        $this->admView->mostrarFormAgregarContenido($generos);
    }

    function eliminarContenido($id){
        $this->auth->checkLoggedIn();
        $this->contModel->eliminarContenido($id);
    }

    function editarContenido($id){
        $this->auth->checkLoggedIn();
        $contenidoAEditar = $this->contModel->fetchPorIdContenido($id);
        $generos = $this->contModel->fetchTabla("genero");
        $this->admView->FormEditarContenido($contenidoAEditar, $generos, $id);
    }

    // ABM Generos
    function agregarGenero(){
        $this->auth->checkLoggedIn();
        $this->admView->mostrarFormAgregarGenero();
    }

    function eliminarGenero($id){
        $this->auth->checkLoggedIn();
        try {
            $this->genModel->eliminarGenero($id);
        }
        catch (Exception $e) {
            $generos = $this->contModel->fetchTabla("genero");
            $this->contView->renderizarGeneros($generos, "No ha sido posible borrar el genero debido a relacion con foreign key");
        }
    }

    function editarGenero($id){
        $this->auth->checkLoggedIn();
        $generoAEditar = $this->genModel->fetchGenero($id);
        $this->admView->FormEditarGenero($generoAEditar, $id);
    }

    //Verificaciones
    function verificarDatosContenido(){
        return isset($_POST['nombre'],$_POST['descripcion'], $_POST['actores'], $_POST['genero'],
            $_POST['anio'], $_POST['cantCaps'], $_POST['cantTemps']);
    }

    function enviarNuevoContenido() {
        $this->contModel->agregarContenido($_POST['nombre'], $_POST['descripcion'], $_POST['actores'], $_POST['genero']
        , $_POST['cantCaps'], $_POST['cantTemps'], $_POST['anio']);
    }

    function enviarModificaciones($id){
        if ($this->verificarDatosContenido()) 
            $this->contModel-> modificarContenido($id, $_POST['nombre'], $_POST['descripcion'], $_POST['actores'], $_POST['genero']
            , $_POST['cantCaps'], $_POST['cantTemps'], $_POST['anio']);
    }

    function verificarDatosGenero(){
        return isset($_POST['nombreGenero'], $_POST['descripcion']);
    }

    function enviarNuevoGenero() {
        $this->genModel->agregarGenero($_POST['nombreGenero'], $_POST['descripcion']);
    }

    function enviarModificacionGenero($id){
        if ($this->verificarDatosGenero()) 
            $this->genModel-> modificarGenero($id, $_POST['nombreGenero'], $_POST['descripcion']);
    }
}