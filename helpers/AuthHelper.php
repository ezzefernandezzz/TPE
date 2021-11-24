<?php

class AuthHelper {

    function __construct() {
    }

    function refreshSession() {
        if (!isset($_SESSION))
            session_start();
    }

    function login($user, $rol) {
        session_start();
        $_SESSION['username'] = $user;
        $_SESSION['logged'] = true;
        $_SESSION['rol'] = $rol;
    }

    function logout() {
        session_start();
        session_destroy();
    }

    function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header('Location:' . BASE_URL . 'login');
            die();
        }
    }

    function userIsAdmin() {
        if (isset($_SESSION['rol'])) {
            return $_SESSION['rol'] == 1;
            die();
        }
    }

    function getUsername() {
        if (isset($_SESSION['username'])) {
            return $_SESSION['username'];
        }
    }
}