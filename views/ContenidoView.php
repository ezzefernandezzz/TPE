<?php
include_once "libs/Smarty.class.php";

class ContenidoView{

    private $smarty;

    public function __construct() {
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

    function renderizarListaContenido($contenido, $genero = null, $actual=0, $url = null){

        $this->smarty->assign('url', BASE_URL.'filtrarContenido');
        $this->smarty->assign('urlPaginacion', BASE_URL.$url);
        $this->smarty->assign('urlSolo', $url);
        $this->smarty->assign("actual", $actual);
        $this->datosSesion();
        if ($genero)
            $this->smarty->assign("genero", "de " . $genero->nombreGenero);
        else
            $this->smarty->assign("genero", "");        
        $this->smarty->assign("contenidos", $contenido);
        $this->smarty->display("templates/tablaContenidos.tpl");
    }

    function renderizarListaContenidoEspecifico($contenido, $id_usuario, $administrador){
        $this->datosSesion();        
        $actores = explode(',', $contenido->actores);
        $this->smarty->assign("idContenido", $contenido->id_contenido);
        $this->smarty->assign("idUsuario", $id_usuario);
        $this->smarty->assign("administrador", $administrador);  
        $this->smarty->assign("nombre", $contenido->nombreContenido);
        $this->smarty->assign("genero", $contenido->nombreGenero);
        $this->smarty->assign("imagen", $contenido->imagen);
        $this->smarty->assign("actores", $actores);
        $this->smarty->assign("descripcion", $contenido->descripcion);
        $this->smarty->assign("anio", $contenido->anio);
        $this->smarty->assign("cantidadCapitulos", null);
        $this->smarty->assign("cantidadTemporadas", null);
        if ($contenido->cantidadTemporadas)
            $this->smarty->assign("cantidadTemporadas", $contenido->cantidadTemporadas);
        if ($contenido->cantidadCapitulos)
            $this->smarty->assign("cantidadCapitulos", $contenido->cantidadCapitulos);
        $this->smarty->display("templates/contenidoEspecifico.tpl");
    }

    function mensajeError(){
        echo "<h2>Error! Género no especificado.</h2>";
    }

    function renderizarGeneros($generos, $mensaje = ""){
        $this->datosSesion();
        $this->smarty->assign("generos", $generos);    
        $this->smarty->assign("mensaje", $mensaje);
        $this->smarty->display("templates/listaGeneros.tpl");
    }

    function renderizarContenidoAdmin($contenido, $generos) {
        $this->smarty->assign("generos", $generos);
        $this->smarty->assign("contenidos", $contenido);
        $this->smarty->display("templates/listaAdmin.tpl");
    }

    function showComentariosLayout() {
        $this->smarty->display('templates/comentariosLayoutCSR.tpl');
    }
}