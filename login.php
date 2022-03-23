<?php 

require "includes/config/database.php";
$db = conectarDB();

//Autenticar el usuario 

$errores = [];


if($_SERVER["REQUEST_METHOD"] === "POST"){
    echo"<pre>";
    var_dump($_POST);
    echo"</pre>";
    
    $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL));
    
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
        $errores[]= "El email es obligatorio";
    }
    if(!$password){
        $errores[]= "El password es obligatorio";
    }
    // echo"<pre>";
    // var_dump($errores);
    // echo"</pre>";
}


// Incluye el header
require "includes/funciones.php";
incluirTemplate("header");

?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Inicias Sesión</h1>
     <?php foreach ($errores as $error): ?>
       <div class="alerta error">
           <?php echo $error; ?>
       </div>


     <?php endforeach; ?>

     <form method="POST" class="formulario" novalidate >
     <fieldset>
                <legend>Email y Password</legend>

        
                <label for="email">Tu correo</label>
                <input type="email" name="email" placeholder="Tu nombre" id="email" required>


                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password" required>

            </fieldset>

            <input type="submit" value="Inicias Sesión" class="boton boton-verde">

     </form>

    </main>

    <?php
    incluirTemplate("footer");
    ?>

  