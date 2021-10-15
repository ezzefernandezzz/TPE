<?php
include_once "./models/UserModel.php";
include_once "./views/RegistroView.php";

class RegistroController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new RegistroView();
    }

    function registrarse(){
        $this->view->showRegistro();
    }

    function enviarRegistro(){
        //Creo la cuenta cuando venga en el POST
        if(!empty($_POST['usuario'])&& !empty($_POST['password'])){
            $userName=$_POST['usuario'];
            $userPassword=password_hash($_POST['password'], PASSWORD_BCRYPT);
            try {
                $this-> model-> guardarUser($userName, $userPassword);
                $this->view->showRegistro("Registrado exitosamente.");
            } catch (Exception $e) {
                $this->view->showRegistro("Nombre no disponible.");
            }
            
        }

    }
}