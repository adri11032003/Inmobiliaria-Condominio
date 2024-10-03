<?php
namespace config;
define('root', $_SERVER['DOCUMENT_ROOT'].'/');
define('views', root .'views/');
define('controlador', root .'bin/controlador/');
define('CONTROL', 'Controlador.php');


define("DIRECTORY_CONTROL", "bin/controlador/");
define("DIRECTORY_MODEL", "bin/modelo/");
define("DIRECTORY_VISTA", "vista/");
define("MODEL", "Modelo.php");
define("VISTA", "Vista.php");

define("CSS", "assets/css/");
define("JS", "assets/js/");
define("LIB", "assets/lib/");
define("IMG", "assets/img/");
define("VALIDATION", "content/js/");

class __init{
    public function _URL_(){
        return _URL_;
    }
    public function _BD_(){
        return _BD_;
    }
    public function _PASS_(){
        return _PASS_;
    }
    public function _USER_(){
        return _USER_;
    }
    public function _LOCAL_(){
        return _LOCAL_;
    }
    public function _Dir_Control_(){
        return DIRECTORY_CONTROL; 
    }
    public function _Dir_Model_(){
        return DIRECTORY_MODEL; 
    }
    public function _Dir_Vista_(){
        return DIRECTORY_VISTA; 
    }
    public function _MODEL_(){
        return MODEL;
    }
    public function _Control_(){
        return CONTROLADOR;
    }
    public function _VISTA_(){
        return VISTA;
    }
}