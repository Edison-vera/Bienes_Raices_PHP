<?php 

require "includes/app.php";


incluirTemplate("header");

?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros </h1>


        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam ab vero suscipit totam temporibus, laudantium eum voluptatem sunt necessitatibus nihil unde magni repellat. Fugiat necessitatibus optio, ut quod odio officiis! Temporibus
                    veritatis natus quasi, laudantium, maiores nisi repellendus expedita minus quibusdam aperiam aliquid commodi totam magnam doloribus ut aliquam hic ullam rem nemo. Natus est ipsam, maiores laborum iure architecto. Ex sunt animi, illo,
                    nisi quas cumque error magni, rerum suscipit dolorum dolor sed ab placeat quam reprehenderit natus culpa fugiat. In distinctio obcaecati libero quod illo quia ad ducimus.
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia illum, porro autem iste modi possimus eius deserunt? Harum fuga ullam porro, ut maxime autem nulla similique rem eius quod laudantium? Modi eveniet ipsum natus quos quam
                    voluptatibus laborum aliquid sapiente? Adipisci earum alias error sequi eum, magni cum unde numquam, sit ullam placeat ut, et ducimus mollitia aliquid eligendi officia!</p>
            </div>

        </div>

    </main>

    <section class="contenedor seccion">
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

    </section>

    <?php
    incluirTemplate("footer");
    ?>
