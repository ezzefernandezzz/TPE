<?php

include "models/GenerosModel.php";

class GeneroController {

    private $view;
    private $model;

    function __construct() {
        $this->model = new GenerosModel();
    }

    function datosSeteados() {
        return isset($_POST['nombre'],$_POST['descripcion']);
    }

    function agregarGenero() {
        if ($this->datosSeteados()) {
            $this->model->agregarGenero($_POST['nombre'],$_POST['descripcion']);
        }
    }

    function modificarGenero($id) {
        if ($this->datosSeteados()) {
            $this->model->modificarGenero($id, $_POST['nombre'], $_POST['descripcion']);
        }
    }

    function eliminarGenero($id) {
        $this->model->eliminarGenero($id);
    }

}