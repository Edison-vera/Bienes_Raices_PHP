<?php 
//Base datos 
require "../../includes/config/database.php";

 $db= conectarDB();

// echo "<pre>";
// var_dump($_SERVER);
// echo "<pre>";

//Arreglo con mensajes de errores 
$errores =[];

//Ejecutar el codigo despues que el usuario envia el formulario 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //  echo "<pre>";
    //  var_dump($_POST);
    //  echo "<pre>";

     $titulo = $_POST["titulo"];
     $precio = $_POST["precio"];
     $descripcion = $_POST["descripcion"];
     $habitaciones = $_POST["habitaciones"];
     $wc = $_POST["wc"];
     $estacionamiento = $_POST["estacionamiento"];
     $vendedorId = $_POST["vendedor"];

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

  
// echo "<pre>";  
// var_dump($errores);
// echo "<pre>";
// exit;

//Revisar que el arreglo de errores este vacio

if(empty($errores)){
//Insertar en la base de datos 

   $query = "INSERT INTO propiedades(titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId ) 
          VALUES('$titulo','$precio','$descripcion','$habitaciones', '$wc', '$estacionamiento', '$vendedorId' )";

// echo $query;

   $resultado = mysqli_query($db, $query);


    if ($resultado){
    echo"Insertado correctamente";
}

}


}
require "../../includes/funciones.php";
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



<form class="formulario " method="POST" action="../propiedades/crear.php">
<fieldset>
<legend>Informacion General</legend>

<label for="titulo">Titulo</label>
<input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

<label for="precio">Precio</label>
<input type="number" id="precio" name="precio" placeholder="Precio de la Propiedad">

<label for="imagen">Imagen</label>
<input type="file" id="imagen" accept="image/jpeg, image/png" >

<label for="descripcion">Descripción</label>
<textarea name="descripcion" name="descripcion" ></textarea>

</fieldset>


<fieldset>
<legend>Información de la propiedad </legend>

<label for="habitaciones">Habitaciones</label>
<input type="number" id="habitaciones" name="habitaciones" placeholder="Numero de habitaciones" min="1" max="9">

<label for="wc">Baños</label>
<input type="number" id="wc" name="wc" placeholder="Numero de baños" min="1" max="9">

<label for="estacionamiento">Estacionamiento</label>
<input type="number" id="estacionamiento" name="estacionamiento" placeholder="Numero de estacionamientos" min="1" max="9">

</fieldset>

<fieldset>
<legend>Vendedor</legend>
<select  name="vendedor">
    <option value="">--Seleccione --</option>
    <option value="1">Edison</option>
    <option value="2">Santiago</option>
</select>


</fieldset>

<input type="submit" value="Crear propiedad" class="boton boton-verde">

</form>





    </main>

<?php
    incluirTemplate("footer");
    ?>

  