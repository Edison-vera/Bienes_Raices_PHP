<?php 

require "includes/funciones.php";


incluirTemplate("header");

?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Inicias Sesión</h1>

     <form class="formulario">
     <fieldset>
                <legend>Email y Password</legend>

        
                <label for="email">Tu correo</label>
                <input type="email" placeholder="Tu nombre" id="email">


                <label for="password">Password</label>
                <input type="password" placeholder="Tu Password" id="password">

            </fieldset>

            <input type="submit" value="Inicias Sesión" class="boton boton-verde">

     </form>

    </main>

    <?php
    incluirTemplate("footer");
    ?>

  