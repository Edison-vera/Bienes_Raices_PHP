<?php 

require "includes/funciones.php";


incluirTemplate("header");

?>


    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Llene el formulario de contacto </h2>


        <form class="formulario">
            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">Tu correo</label>
                <input type="email" placeholder="Tu nombre" id="email">


                <label for="telefono">Tu telefono</label>
                <input type="tel" placeholder="telefono" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vendo o compra</label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Vende">Vende</option>
                    <option value="Compra">Compra</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">


            </fieldset>


            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-correo">Correo</label>
                    <input name="contacto" type="radio" value="correo" id="contactar-correo">
                </div>

                <p>Si eligio telefono, elija la fecha y la hora </p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">hora:</label>
                <input type="time" id="hora" min="08:00" max="18:00">

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>

    </main>

    <?php
    incluirTemplate("footer");
    ?>

