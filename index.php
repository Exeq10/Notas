<?php 


$error = [];




include 'includes/conexion/databases.php';

$db = conectarDB();

require 'includes/header.php';
$titulo = '';
$contenido = '';
$fecha = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $fecha = date('y/m/d');
   

   
 
    $query = "INSERT INTO nota (titulo,contenido,fecha) VALUES ('$titulo','$contenido','$fecha')";
   if (strlen($contenido) > 60) {
       $error[]= 'La nota no puede ser mayor a 60 carateres <br>';
   }


    if (!$titulo || !$contenido ){
        $error [] = 'Todos los campos son obligatorios';
    }
 
  else{
      $resultado = mysqli_query($db,$query);
        if ($resultado) {
            
            header('Location: /notas.php?alerta=Se guardó correctamente!!') ;
        }
  } 
    
    

};





?>


    <main class="contenido contenedor">
<div class="error">
    <?php if ($error) {
        foreach ($error as $key ) {
            echo $key;
        }
    } ?>

</div>
        <h2>Bienvenid@!!</h2>
        <div class="texto">

            <p>Te damos la bienvenida a Tus Notas, como es de esperarse es un sistema para crear notas, en donde puedes plasmar tu dia a dia. </p>
        </div>
   
        <form method="POST" class="formulario">
            <fieldset>
                <legend>Crea tu nota</legend>
                <label for="titulo" id="titulo">Titulo</label>
                <input class="campo" type="text" placeholder="Titulo de la nota" name="titulo">

                <label for="contenido">Nota</label>
                <textarea class="campo" name="contenido" id="contenido" placeholder="Escribe tu nota"></textarea>


                <input type="submit" value="CREAR" class="boton">


            </fieldset>
        </form>

  


        </section>
    </main>


<?php 
require 'includes/footer.php'



?>

</body>


</html>