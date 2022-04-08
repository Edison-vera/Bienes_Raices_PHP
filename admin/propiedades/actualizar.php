<?php

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

require "../../includes/app.php";
estaAutenticado();

//Validar que sea un ID valido 
$id =$_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header("Location: ../");
}


 // Obtener los datos de la propiedad 

 $propiedad = Propiedad::find($id);

//Consultar para obtener los vendedores de la base de datos 
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);


//Arreglo con mensajes de errores 
$errores = Propiedad::getErrores();



//Ejecutar el codigo despues que el usuario envia el formulario 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

 
//Asignar los atributos
$args =$_POST["propiedad"];



$propiedad->sincronizar($args);

//Validacion de errores 
$errores = $propiedad->validar();

//Subida de archivos
   //Generar un nombre unico
   $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

   //Realiz un resize a la imagen con intervetion
   if($_FILES["propiedad"]["tmp_name"]["imagen"]){
    $image = Image::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800,600);
    $propiedad->setImagen($nombreImagen);
   }

   debugear($propiedad);

if(empty($errores)){




    exit;
//Insertar en la base de datos 

   $query = "UPDATE propiedades SET titulo = '${titulo}', precio = ${precio}, imagen ='${nombreImagen}', descripcion = '${descripcion}', habitaciones = '${habitaciones}',
             wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id= ${id} ";

//    echo $query;


   $resultado = mysqli_query($db, $query);


    if ($resultado){
    // echo"Insertado correctamente";
   //Redireccionar al usuario
   header("location: ../?resultado=2"); 

}

}


}

incluirTemplate("header");

?>
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="../" class="boton boton-verde">Volver</a>

<?php foreach($errores as $error ): ?>

<div class="alerta error ">
<?php echo $error; ?>
</div>
<?php endforeach; ?>



<form class="formulario " method="POST"  enctype="multipart/form-data">

<?php include "../../includes/templates/formulario_propiedades.php";?>

<input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

</form>



    </main>

<?php
    incluirTemplate("footer");
    ?>

  