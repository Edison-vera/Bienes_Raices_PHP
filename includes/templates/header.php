<?php
     
     if(!isset($_SESSION)){
        session_start();
     }
     

     $auth = $_SESSION["login"] ?? false;
    //  var_dump($auth);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raicies</title>
    <!-- Agregar hoja de estilos -->
    <link rel="stylesheet" href="http://localhost/BienesRaices/build/css/app.css">

</head>

<body>

    <header class="header <?php echo $inicio ?"inicio": ""; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/BienesRaices/index.php">
    
                     <img src="http://localhost/BienesRaices/build/img/logo.png" alt="logotipo"> 
                </a>
                <div class="mobile-menu">
                    <img src="http://localhost/BienesRaices/build/img/barras.svg" alt="Logotipo de bienes raices">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="http://localhost/BienesRaices/build/img/dark-mode.svg" alt="Dark Mode">
                    <nav class="navegacion">
                        <a href="/BienesRaices/nosotros.php">Nosotros</a>
                        <a href="/BienesRaices/anuncios.php">Anuncios</a>
                        <a href="/BienesRaices/blog.php">Blog</a>
                        <a href="/BienesRaices/contacto.php">Contacto</a>
                        <?php if($auth):  ?>
                            <a href="/BienesRaices/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <!-- Cierre de la barra -->

         <?php 
              if($inicio){
                  echo "<h1> Venta de casas y departamientos exclusivos de lujo </h1>";
              }
         ?>

        </div>
    </header>