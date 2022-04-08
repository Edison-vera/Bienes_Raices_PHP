<?php

use App\Propiedad;

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
$errores =[];



//Ejecutar el codigo despues que el usuario envia el formulario 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

 
//Asignar los atributos
$args =$_POST["propiedad"];



$propiedad->sincronizar($args);
debugear($propiedad);

// Asignar files hacia una variable      
$imagen = $_FILES["imagen"];


if(!$titulo){
    $errores[]= "Debes añadir un titulo";
}

if(!$precio){
    $errores[]= "Debes añadir un precio";
}

if(strlen( $descripcion) < 50){
    $errores[]= "Debes añadir una descripcion y debe tener al menos 50 caracteres";
}

if(!$habitaciones){
    $errores[]= "Debes añadir el numero de habitaciones";
}
if(!$wc){
    $errores[]= "Debes añadir el numero de baños";
}
if(!$estacionamiento){
    $errores[]= "Debes añadir el numero de estacionamientos";
}
if(!$vendedorId){
    $errores[]= "Debes añadir el vendedor";
}



// Validar por tamaño (100 kb maximo)
$medida = 1000 * 1000;

if ($imagen["size"] > $medida){
    $errores [] = "La imagen es muy pesada";
}


//Revisar que el arreglo de errores este vacio

if(empty($errores)){

//     /**Subida de archivos */

//     //Crear una carpeta
      $carpetaImagenes ="../../imagenes/";

     if (!is_dir($carpetaImagenes)){
     mkdir($carpetaImagenes);
     }
     
    $nombreImagen = "";

    

      if($imagen["name"]){

    //Eliminar imagen previa
          unlink($carpetaImagenes . $propiedad["imagen"]);

    //Generar un nombre unico
       $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


    // Subir la imagen 
          move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . $nombreImagen );
      } else {
          $nombreImagen = $propiedad["imagen"];
      }



   



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

  