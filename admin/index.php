<?php 

require "../includes/app.php";
estaAutenticado();

use App\Propiedad;

//Implementar un metodo para obtener todas las propiedades 
$propiedades = Propiedad::all();

//Muestra mensaje condicional
$resultado =$_GET["resultado"] ?? null;


//Eliminar de la base de datos un registro
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){

        //Eliminar imagenes de la propiedad 
        $query = "SELECT imagen FROM propiedades WHERE id =${id}";

        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink("../imagenes/" . $propiedad["imagen"]);
      
        
        //Eliminar la propiedad de la bade de datos 
        $query = "DELETE FROM propiedades WHERE id = ${id}";
        $resultado = mysqli_query($db, $query);

        if($resultado){
            header("location: ../admin?resultado=3");
        }
    }

}

//Incluye un template

incluirTemplate("header");

?>
    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php if (intval( $resultado)===1):?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif (intval( $resultado)===2):?>
        <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif (intval( $resultado)===3):?>
        <p class="alerta exito">Anuncio Elimado Correctamente</p>
        <?php endif; ?>


        <a href="../../BienesRaices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
              <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
              </thead>
            
              <tbody> <!-- Mostrar los resultados --->
              <?php foreach($propiedades as $propiedad):  ?>
                    <tr>
                        <td><?php echo $propiedad->id; ?></td>
                        <td><?php echo $propiedad->titulo; ?></td>
                        <td> <img src="../../BienesRaices/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                        <td>$ <?php echo $propiedad->precio; ?></td>
                        <td>
                           <form method="POST" class="w-100">

                                <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">


                                <input type="submit"  class="boton-rojo-block" value="Eliminar">
                           </form>
                            <a href="../../BienesRaices/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>    
                        </td>
                    </tr>
                    <?php endforeach; ?>
              </tbody>



        </table>


    </main>

<?php

//Cerrar la conexion

    mysqli_close($db);

    incluirTemplate("footer");
    ?>
