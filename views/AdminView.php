<?php

class AdminView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
    }

    function datosSesion(){
        $this->smarty->assign("loggeado", "false");
        $this->smarty->assign("username"," ");
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            $this->smarty->assign("loggeado", "true");
            $this->smarty->assign("username", $_SESSION['username']);
        }
    }

    function renderizarContenidoAdmin($contenido, $generos) {
        $this->datosSesion(); 
        $this->smarty->assign("generos", $generos);
        $this->smarty->assign("contenidos", $contenido);
        $this->smarty->display("templates/listaAdmin.tpl");
    }

    function mostrarFormAgregarContenido($generos){
        $this->datosSesion();

        $this->smarty->assign('url', BASE_URL.'agregarContenido');
        $this->smarty->assign('titulo', "");
        $this->smarty->assign('descripcion', "");
        $this->smarty->assign('actores', "");
        $this->smarty->assign('anio', "");
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('cantCaps', "");
        $this->smarty->assign('cantTemps', "");
        $this->smarty->assign('generoPrevioId',"");
        $this->smarty->display("templates/formItem.tpl");
    }
    
    function FormEditarContenido($contenido ,$generos, $id){
        $this->datosSesion();

        $this->smarty->assign('imagen', $contenido->imagen);
        $this->smarty->assign('url', BASE_URL.'enviarModificaciones/'.$id);
        $this->smarty->assign('titulo',$contenido->nombreContenido);
        $this->smarty->assign('descripcion', $contenido->descripcion);
        $this->smarty->assign('actores', $contenido->actores);
        $this->smarty->assign('anio', $contenido->anio);
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('generoPrevioId',$contenido->id_genero);
        $this->smarty->assign('cantCaps',$contenido->cantidadCapitulos);
        $this->smarty->assign('cantTemps',$contenido->cantidadTemporadas);
        $this->smarty->display("templates/formItem.tpl");
    }

    function FormEditarGenero($genero, $id){
        $this->datosSesion();

        $this->smarty->assign('url', BASE_URL.'generoModificado/'.$id);
        $this->smarty->assign('nombreGenero', $genero->nombreGenero);
        $this->smarty->assign('descripcionGenero', $genero->descripcion);
        $this->smarty->display("templates/formGenero.tpl");
    }

    function mostrarFormAgregarGenero(){
        $this->datosSesion();
        $this->smarty->assign('url', BASE_URL.'agregarGeneroDB');
        $this->smarty->assign('nombreGenero', "");
        $this->smarty->assign('descripcionGenero', "");
        $this->smarty->display("templates/formGenero.tpl");
    }

    function mostrarUsuarios($usuarios){
        $this->datosSesion();
        $this->smarty->assign('url', BASE_URL.'actualizarUsuario');
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->display("templates/listaUsuarios.tpl");
    }

}