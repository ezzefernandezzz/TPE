<?php
include_once "libs/Smarty.class.php";

class ContenidoView{

    private $smarty;

    public function __construct() {
        //1. instancio smarty
        //$smarty = new Smarty();
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
    }

    function datosSesion(){
        //session_start();
        $this->smarty->assign("loggeado", "false");
        $this->smarty->assign("username"," ");
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            $this->smarty->assign("loggeado", "true");
            $this->smarty->assign("username", $_SESSION['username']);
        }
    }

    function renderizarListaContenido($contenido, $genero = null){
        //2.asigno datos al template
        $this->datosSesion();
        if ($genero)
            $this->smarty->assign("genero", "de " . $genero->nombreGenero);
        else
            $this->smarty->assign("genero", "");
        $this->smarty->assign("contenidos", $contenido);
        $this->smarty->display("templates/tablaContenidos.tpl");
    }

    function renderizarListaContenidoEspecifico($contenido){
        $this->datosSesion();
        
        $actores = explode(',', $contenido->actores);
        //2.asigno datos al template
        $this->smarty->assign("nombre", $contenido->nombreContenido);
        $this->smarty->assign("genero", $contenido->nombreGenero);
        $this->smarty->assign("actores", $actores);
        $this->smarty->assign("descripcion", $contenido->descripcion);
        $this->smarty->assign("anio", $contenido->anio);
        $this->smarty->assign("cantidadCapitulos", null);
        $this->smarty->assign("cantidadTemporadas", null);
        if ($contenido->cantidadTemporadas)
            $this->smarty->assign("cantidadTemporadas", $contenido->cantidadTemporadas);
        if ($contenido->cantidadCapitulos)
            $this->smarty->assign("cantidadCapitulos", $contenido->cantidadCapitulos);
        //3.lo invoco para renderizar
        $this->smarty->display("templates/contenidoEspecifico.tpl");
    }

    function mensajeError(){
        echo "<h2>Error! Género no especificado.</h2>";
    }

    function renderizarGeneros($generos, $mensaje = ""){
        $this->datosSesion();
        $this->smarty->assign("generos", $generos);    
        $this->smarty->assign("mensaje", $mensaje);    
        //3.lo invoco para renderizar
        $this->smarty->display("templates/listaGeneros.tpl");
    }

    function renderizarContenidoAdmin($contenido, $generos) {
        $this->smarty->assign("generos", $generos);
        $this->smarty->assign("contenidos", $contenido);
        
        //3.lo invoco para renderizar 
        $this->smarty->display("templates/listaAdmin.tpl");
        //$this->smarty->display("templates/listaContenido.tpl");
        //$this->smarty->display("templates/formItem.tpl"); // --> No tiene que llamarse aca
        // mostrarFormItem()
        // Editar -> obtiene ID del contenido y te lo pasa a los inputs
        // Agregar -> Puede ser un boton O estar abajo de todo.
    }

    function mostrarFormAgregar($generos){
        $this->smarty->assign('url', BASE_URL.'/agregarContenido');
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
    
    function mostrarFormEditar($contenido ,$generos, $id){
        $this->smarty->assign('url', BASE_URL.'/enviarModificaciones/$id');
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
}