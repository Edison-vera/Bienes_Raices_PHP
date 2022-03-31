<?php

function conectarDB () : mysqli{
    $db = new mysqli("localhost","root", "root", "bienes_raices");

if(!$db){
    echo "No se conecto";
    exit;
}

return $db;

}