<?php

class AuthHelper {

    function __construct() {
    }

    function refreshSession() {
        session_start();
    }

    function login($user) {
        session_start();
        $_SESSION['username'] = $user;
        $_SESSION['logged'] = true;
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

    function getUsername() {
        session_start();
        if (isset($_SESSION['username'])) {
            return $_SESSION['username'];
        }
    }
}