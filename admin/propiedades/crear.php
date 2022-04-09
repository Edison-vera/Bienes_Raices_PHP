<?php 
require "../../includes/app.php";

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;


estaAutenticado();

$db= conectarDB();

$propiedad = new Propiedad;

//Consultar para obtener los vendedores de la base de datos 
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// echo "<pre>";
// var_dump($_SERVER);
// echo "<pre>";



//Arreglo con mensajes de errores 
$errores = Propiedad::getErrores();

//Ejecutar el codigo despues que el usuario envia el formulario 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    //Crea una nueva instancia
    $propiedad = new Propiedad($_POST["propiedad"]);

    /**Subida de archivos */
  

    //Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
    //Setear la imagen
    //Realiz un resize a la imagen con intervetion
    if($_FILES["propiedad"]["tmp_name"]["imagen"]){
     $image = Image::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800,600);
     $propiedad->setImagen($nombreImagen);
    }

    //Validar
    $errores= $propiedad->validar();
    

    if(empty($errores)){
    


      //Crear una carpeta
      $carpetaImagenes ="../../imagenes/";

      if (!is_dir(CARPETA_IMAGENES)){
          mkdir(CARPETA_IMAGENES);
        }

    //Guarda la imagen en el servidor
    $image->save(CARPETA_IMAGENES . $nombreImagen);
    
    //Guarda en la base de datos
    $propiedad->guardar();

  

}


}

incluirTemplate("header");

?>
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="../" class="boton boton-verde">Volver</a>

<?php foreach($errores as $error ): ?>

<div class="alerta error ">
<?php echo $error; ?>
</div>
<?php endforeach; ?>



<form class="formulario " method="POST" action="../propiedades/crear.php" enctype="multipart/form-data">

<?php include "../../includes/templates/formulario_propiedades.php";?>

<input type="submit" value="Crear propiedad" class="boton boton-verde">

</form>



    </main>

<?php
    incluirTemplate("footer");
    ?>

  