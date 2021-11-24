<?php
include_once "./models/ContenidoModel.php";
include_once "./models/GenerosModel.php";
include_once "./views/ContenidoView.php";
include_once "./views/AdminView.php";
include_once "helpers/AuthHelper.php";
include_once "models/UserModel.php";

class ContenidoController{

    private $model;
    private $modelGenero;
    private $view;
    private $adminView;
    private $auth;
    private $userModel;

    public function __construct(){
        $this->model = new ContenidoModel();
        $this->modelGenero = new GenerosModel();
        $this->view = new ContenidoView();
        $this->adminView = new AdminView();
        $this->auth = new AuthHelper();
        $this->userModel = new UserModel();
    }

    function showHome(){
        $this->auth->refreshSession();
        $actual = 0;
        if (isset($_POST['actual']))
            $actual = $_POST['actual'];
        if (isset($_POST['botonAtras'])) {
            $actual = $actual - 5;
        } else if (isset($_POST['botonSiguiente'])) {
            $actual = $actual + 5;
        }
        if ($actual < 0)
            $actual = 0;
        $contenido = $this->model->fetchTablaContenido($actual);
        if (!$contenido)
            $actual = 0;
        $contenido = $this->model->fetchTablaContenido($actual);
        $this->view->renderizarListaContenido($contenido, null, $actual, 'home');
    }
    
    function cargarContenidoFiltrado() {
        $this->auth->refreshSession();
        if (isset($_POST['campo-filtrar'], $_POST['campo-busqueda'])) {
            $campoFiltrar = $_POST['campo-filtrar'];
            $valorBusqueda = $_POST['campo-busqueda'];
            $valorBusqueda = "%".$valorBusqueda."%";
            $contenido = $this->model->fetchContenidoFiltrado($campoFiltrar, $valorBusqueda);
        }  else
            $contenido = $this->model->fetchTablaContenido(0);
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
            $nombreUsuario = $this->auth->getUsername();
            $usuario = $this->userModel->getUser($nombreUsuario);
            if ($usuario)
                $id_usuario = $usuario->id_usuario;
            else {
                $id_usuario = null;
            }
            $contenido = $this->model->fetchPorIdContenido($id);
            $this->view->renderizarListaContenidoEspecifico($contenido, $id_usuario, $this->auth->userIsAdmin());
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

}

