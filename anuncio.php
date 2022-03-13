<?php 

require "includes/funciones.php";


incluirTemplate("header");

?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque </h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="anuncios">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi error in architecto, explicabo ratione quod, quaerat numquam voluptatum magnam neque officia aspernatur at voluptas totam quis quibusdam reprehenderit corrupti modi? Atque dolorum
                cumque ea nisi culpa sunt provident praesentium voluptate illum dolor ex numquam ducimus nesciunt libero odio nemo exercitationem, reprehenderit magni expedita dolore amet, eaque molestiae debitis eius? Quam? Vel delectus libero consectetur
                eius deleniti soluta cupiditate qui laudantium debitis dolore asperiores aut iusto, accusantium labore facere beatae officia. Error in et fugit sit exercitationem doloribus pariatur commodi eos.</p>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi error ducimus, magnam quo iste recusandae a esse consequatur nesciunt, nemo facere nulla, explicabo saepe quos unde. Animi maxime vero ea. Molestias magni blanditiis omnis dolorum
                quia id nesciunt fugit voluptas, vitae maiores itaque quibusdam dolores ullam, mollitia inventore veniam laboriosam necessitatibus praesentium velit illo, officiis repudiandae hic quod. Tempore, necessitatibus?</p>

        </div>


    </main>

    <?php
    incluirTemplate("footer");
    ?>
