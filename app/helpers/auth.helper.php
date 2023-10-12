<?php

class AuthHelper {
    
    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        AuthHelper::init();
        $_SESSION['username'] = $user->usuario;
        $_SESSION['id'] = $user->id;
    }

    public static function isAdmin(){
        AuthHelper::init();
        return !empty($_SESSION['id']);
    }
}