<?php 

require "includes/funciones.php";


incluirTemplate("header", $inicio= true);

?>

    <main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>

        <div class="inconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>ipsum dolor sit amet consectetur adipisicing elit. Laborum nulla alias quae modi optio totam vero, quam aut sapiente distinctio voluptatem ex! Ex ipsum, similique repudiandae quia voluptate nesciunt ipsam?</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>ipsum dolor sit amet consectetur adipisicing elit. Laborum nulla alias quae modi optio totam vero, quam aut sapiente distinctio voluptatem ex! Ex ipsum, similique repudiandae quia voluptate nesciunt ipsam?</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>ipsum dolor sit amet consectetur adipisicing elit. Laborum nulla alias quae modi optio totam vero, quam aut sapiente distinctio voluptatem ex! Ex ipsum, similique repudiandae quia voluptate nesciunt ipsam?</p>
            </div>


        </div>

    </main>

    <section class="seccion contenedor">
        <h2>Casas y departamentos en venta</h2>

        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncios">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa de lujo en el lago </h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo a un exelente precio</p>
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

                    <a href="anuncios.php" class="boton-amarillo-block">Ver Propiedad</a>
                </div>
                <!--- Contenido anuncio -->
            </div>
            <!-- Anuncio -->

            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/anuncio2.jpg" alt="anuncios">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casas terminadas de lujo </h3>
                    <p>Casa con diseño moderno, asi como tecnologia inteligente y amueblada</p>
                    <p class="precio">$2,000,000</p>

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

                    <a href="anuncios.php" class="boton-amarillo-block">Ver Propiedad</a>
                </div>
                <!--- Contenido anuncio -->
            </div>
            <!-- Anuncio -->



            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/anuncio3.jpg" alt="anuncios">
                </picture>

                <div class="contenido-anuncio">
                    <h3>Casa con alberca </h3>
                    <p>Casa con alberca y acabados de lujo en la cuidad, excelente oportunidad</p>
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

                    <a href="anuncios.php" class="boton-amarillo-block">Ver Propiedad</a>
                </div>
                <!--- Contenido anuncio -->
            </div>
            <!-- Anuncio -->

        </div>
        <!-- Contenedor-Anuncios -->

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>
        </div>

    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestros blog</h3>
            <article class="entrada-blog">

                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa </h4>
                        <p class="informacion-meta">Escrito el: <span>20/03/2022</span> por <span>Admin</span> </p>

                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero </p>

                    </a>

                </div>

            </article>
            <!-- Fin del article -->

            <article class="entrada-blog">

                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpg">
                        <img src="build/img/blog2.jpg" alt="Texto entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la deroracion de tu hogar </h4>
                        <p class="informacion-meta">Escrito el: <span>05/03/2022</span> por <span>Admin</span> </p>

                        <p>Maximiza el espacio de tu hogar en esta guia, aprende a combinar muebles y colores para darle vida a tu espacio </p>

                    </a>

                </div>

            </article>
            <!-- Fin del article -->

        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una exelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Juan de la torre</p>
            </div>

        </section>
    </div>

    <?php
    incluirTemplate("footer");
    ?>

 

