<?php 

require "../../includes/funciones.php";
$auth = estaAutenticado();

if(!$auth){
    header("location: /BienesRaices");
}

// echo"<pre>";
// var_dump($_GET);
// echo "<pre>";


//Validar que sea un ID valido 
$id =$_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header("Location: ../");
}

// var_dump($id);

//Base datos 
require "../../includes/config/database.php";
 $db= conectarDB();

 // Obtener los datos de la propiedad 
$consulta = "SELECT * FROM propiedades WHERE id = ${id}";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);

// echo"<pre>";
// var_dump($propiedad);
// echo"<pre>";

//Consultar para obtener los vendedores de la base de datos 
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// echo "<pre>";
// var_dump($_SERVER);
// echo "<pre>";



//Arreglo con mensajes de errores 
$errores =[];

     $titulo = $propiedad["titulo"];
     $precio = $propiedad["precio"];
     $descripcion = $propiedad["descripcion"];
     $habitaciones = $propiedad["habitaciones"];
     $wc = $propiedad["wc"];
     $estacionamiento = $propiedad["estacionamiento"];
     $vendedorId = $propiedad["vendedorId"];
     $imagenPropiedad = $propiedad["imagen"];



//Ejecutar el codigo despues que el usuario envia el formulario 
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    //    echo "<pre>";
    //    var_dump($_POST);
    //    echo "<pre>";
// exit;
    //   echo "<pre>";
    //   var_dump($_FILES);
    //   echo "<pre>";

    

     $titulo =mysqli_real_escape_string( $db, $_POST["titulo"]);
     $precio =mysqli_real_escape_string( $db, $_POST["precio"]);
     $descripcion =mysqli_real_escape_string( $db, $_POST["descripcion"]);
     $habitaciones =mysqli_real_escape_string( $db, $_POST["habitaciones"]);
     $wc =mysqli_real_escape_string( $db, $_POST["wc"]);
     $estacionamiento =mysqli_real_escape_string( $db, $_POST["estacionamiento"]);
     $vendedorId =mysqli_real_escape_string( $db, $_POST["vendedor"]);
     $creado = date("y/m/d");


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



  
// echo "<pre>";  
// var_dump($errores);
// echo "<pre>";
// exit;

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
<fieldset>
<legend>Informacion General</legend>

<label for="titulo">Titulo</label>
<input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

<label for="precio">Precio</label>
<input type="number" id="precio" name="precio" placeholder="Precio de la Propiedad" value="<?php echo $precio; ?>">

<label for="imagen">Imagen</label>
<input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen" >
<img class="imagen-small" src="../../../BienesRaices/imagenes/<?php echo $imagenPropiedad; ?>" >

<label for="descripcion">Descripción</label>
<textarea name="descripcion" name="descripcion" > <?php echo $descripcion; ?></textarea>

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
<select  name="vendedor" >
    <option value="">--Seleccione --</option>
    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
<option <?php echo $vendedorId === $vendedor["id"] ? "selected": ""; ?>   value="<?php echo $vendedor["id"]; ?>"> <?php echo $vendedor  ["nombre"] . " " . $vendedor["apellido"]; ?></option>

    <?php endwhile; ?>    
</select>


</fieldset>

<input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

</form>



    </main>

<?php
    incluirTemplate("footer");
    ?>

  