<?php
include_once "./models/ContenidoModel.php";
include_once "./models/GenerosModel.php";
include_once "./views/ContenidoView.php";
include_once "./views/AdminView.php";
include_once "helpers/AuthHelper.php";

class ContenidoController{
    private $model;
    private $view;
    private $adminView;

    public function __construct(){
        $this->model = new ContenidoModel();
        $this->modelGenero = new GenerosModel();
        $this->view = new ContenidoView();
        $this->adminView = new AdminView();
        $this->auth = new AuthHelper();
    }

    function showHome(){
        $this->auth->refreshSession();
        $contenido = $this->model->fetchTabla("contenido");
        $this->view->renderizarListaContenido($contenido);
    }

    function cargarGeneros(){
        $this->auth->refreshSession();
        $generos = $this->model->fetchTabla("genero");
        $this->view->renderizarGeneros($generos);//IMPLEMENTAR
    }

    function cargarContenidoEspecifico($id = null){
        $this->auth->refreshSession();
        if($id){
            $contenido = $this->model->fetchPorIdContenido($id);
            $this->view->renderizarListaContenidoEspecifico($contenido);
        }
        else
            $this->view->mensajeError();
    }

    function cargarContenidoGenero($id = null){
        $this->auth->refreshSession();
        if($id){
            $contenidoGenero = $this->model->fetchPorGenero($id);
            $nombreGenero = $this->modelGenero->fetchGenero($id);
            $this->view->renderizarListaContenido($contenidoGenero, $nombreGenero);
        }
        else
            $this->view->mensajeError();
    }

    ///////////////////////FUNCIONES ABM///////////////////////
    function agregarContenido(){
        $this->auth->checkLoggedIn();
        $generos = $this->model->fetchTabla("genero");
        $this->adminView->mostrarFormAgregarContenido($generos);
    }

    function eliminarContenido($id){
        $this->model->eliminarContenido($id);
    }

    function editarContenido($id){
        $contenidoAEditar = $this->model->fetchPorIdContenido($id);
        $generos = $this->model->fetchTabla("genero");
        $this->adminView->mostrarFormEditar($contenidoAEditar, $generos, $id);
    }

    ////////////////////////GENEROS///////////
    function agregarGenero(){
        $this->cargarGeneros();
        $this->adminView->mostrarFormAgregarGenero();
    }

    function eliminarGenero($id){
        $this->model->eliminarGenero($id);
    }

    function editarGenero($id){
        $generoAEditar = $this->model->fetchPorGenero($id);
        $this->adminView->mostrarFormEditar($generoAEditar, $id);
    }
    ////////////////////////////////////////////////////////

    function verificarDatosContenido(){
        return isset($_POST['nombre'],$_POST['descripcion'], $_POST['actores'], $_POST['genero'],
            $_POST['anio'], $_POST['cantCaps'], $_POST['cantTemps']);
    }

    function enviarNuevoContenido() {
        $this->model->agregarContenido($_POST['nombre'], $_POST['descripcion'], $_POST['actores'], $_POST['genero']
        , $_POST['cantCaps'], $_POST['cantTemps'], $_POST['anio']);
    }

    function enviarModificaciones($id){
        if (verificarDatosContenido()) 
            $this->model-> modificarContenido($id, $_POST['nombre'], $_POST['descripcion'], $_POST['actores'], $_POST['genero']
            , $_POST['cantCaps'], $_POST['cantTemps'], $_POST['anio']);
    }

    function verificarDatosGenero(){
        return isset($_POST['nombre'], $_POST['descripcion']);
    }

    function enviarNuevoGenero() {
        $this->model->agregarGenero($_POST['nombre'], $_POST['descripcion']);
    }

}


