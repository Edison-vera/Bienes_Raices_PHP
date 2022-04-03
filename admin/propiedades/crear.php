<?php 
require "../../includes/app.php";

use App\Propiedad;


estaAutenticado();

$db= conectarDB();


//Consultar para obtener los vendedores de la base de datos 
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// echo "<pre>";
// var_dump($_SERVER);
// echo "<pre>";



//Arreglo con mensajes de errores 
$errores = Propiedad::getErrores();


     $titulo = "";
     $precio = "";
     $descripcion = "";
     $habitaciones = "";
     $wc = "";
     $estacionamiento = "";
     $vendedorId = "";



//Ejecutar el codigo despues que el usuario envia el formulario 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $propiedad = new Propiedad($_POST);
    $errores= $propiedad->validar();
    

//Revisar que el arreglo de errores este vacio

if(empty($errores)){
    
    $propiedad->guardar();
    // Asignar files hacia una variable 
    $imagen = $_FILES["imagen"];


    /**Subida de archivos */

    //Crear una carpeta
    $carpetaImagenes ="../../imagenes/";

    if (!is_dir($carpetaImagenes)){
    mkdir($carpetaImagenes);
    }

    //Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";



   // Subir la imagen 
    move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . $nombreImagen );




// echo $query;

   $resultado = mysqli_query($db, $query);


    if ($resultado){
    // echo"Insertado correctamente";
   //Redireccionar al usuario
   header("location: ../?resultado=1"); 

}

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
<fieldset>
<legend>Informacion General</legend>

<label for="titulo">Titulo</label>
<input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

<label for="precio">Precio</label>
<input type="number" id="precio" name="precio" placeholder="Precio de la Propiedad" value="<?php echo $precio; ?>">

<label for="imagen">Imagen</label>
<input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen" >

<label for="descripcion">Descripción</label>
<textarea name="descripcion" name="descripcion"  > <?php echo $descripcion;  ?></textarea>

</fieldset>


<fieldset>
<legend>Información de la propiedad </legend>

<label for="habitaciones">Habitaciones</label>
<input type="number" id="habitaciones" name="habitaciones" placeholder="Numero de habitaciones" min="1" max="9" value="<?php echo $habitaciones; ?>">

<label for="wc">Baños</label>
<input type="number" id="wc" name="wc" placeholder="Numero de baños" min="1" max="9" value="<?php echo $wc; ?>">

<label for="estacionamiento">Estacionamiento</label>
<input type="number" id="estacionamiento" name="estacionamiento" placeholder="Numero de estacionamientos" min="1" max="9" value="<?php echo $estacionamiento; ?>">

</fieldset>

<fieldset>
<legend>Vendedor</legend>
<select  name="vendedorId" >
    <option value="">--Seleccione --</option>
    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
<option <?php echo $vendedorId === $vendedor["id"] ? "selected": ""; ?>   value="<?php echo $vendedor["id"]; ?>"> <?php echo $vendedor  ["nombre"] . " " . $vendedor["apellido"]; ?></option>

    <?php endwhile; ?>    
</select>


</fieldset>

<input type="submit" value="Crear propiedad" class="boton boton-verde">

</form>



    </main>

<?php
    incluirTemplate("footer");
    ?>

  