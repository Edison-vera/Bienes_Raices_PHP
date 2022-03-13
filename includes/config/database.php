<?php

function conectarDB () : mysqli{
    $db = mysqli_connect("localhost","root", "root", "bienes_raices");

if(!$db){
    echo "No se conecto";
    exit;
}

return $db;

}