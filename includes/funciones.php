<?php


define('TEMPLATES_URL' , __DIR__ .'/templates');
define('FUNCIONES_URL', __DIR__ .'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');



function incluirTemplate (string $nombre, bool $inicio = false){
    // echo TEMPLATES_URL . "/${nombre}.php";
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado () {
    
    session_start();
    
    if(!$_SESSION["login"]){
        header("location: ../BienesRaices");
    }
   
}

function debugear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}



    //  echo "<pre>";
    //  var_dump($_SESSION);
    //  echo "<pre>";
    
   
     