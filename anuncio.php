<?php 

$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);

var_dump($id);

 if (!$id){
     header("location: ../BienesRaices");
    }

     //Importar la conexion
     require "../BienesRaices/includes/config/database.php";
     $db = conectarDB();
     
     //Consultar
     $query = "SELECT * FROM propiedades WHERE id = ${id}";

     //Obtener resultado
     $resultado = mysqli_query($db, $query);

    if(!$resultado->num_rows){
        header("location: ../BienesRaices");
    }

     $propiedad = mysqli_fetch_assoc($resultado);






require "includes/funciones.php";


incluirTemplate("header");

?>


    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad["titulo"]; ?> </h1>
        
            <img loading="lazy" src="../../../BienesRaices/imagenes/<?php echo $propiedad["imagen"]; ?>" alt="anuncios">
    

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad["precio"]; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad["wc"]; ?></p>
                </li>

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad["estacionamiento"]; ?></p>
                </li>

                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad["habitaciones"]; ?></p>
                </li>
            </ul>

            <p><?php echo $propiedad["descripcion"]; ?></p>

           

        </div>


    </main>
    

    <?php
    mysqli_close($db);
    incluirTemplate("footer");
    ?>
