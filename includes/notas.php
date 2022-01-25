<?php 
include 'includes/conexion/databases.php';
$db = conectarDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    if ($id) {
        
        $borrar = "DELETE FROM nota WHERE id = ${id}"; 
        $borrado = mysqli_query($db,$borrar);

        if ($borrado) {
            header('Location: /notas.php?alerta=Borrado Correctamente!!<br>');
        }
    }
    }
    
   
       

    

$alerta = $_GET;
$error = [];



$query = "SELECT * FROM nota";

$resultado = mysqli_query($db,$query);


if ($resultado->num_rows === 0) {
    $error[] = 'No tienes notas aún';
}





?>








        <section class="notas">



<main class = "notas_c">
<div class="mensaje">
<?php 
if ($alerta) {
    foreach ($alerta as $key ) {
         echo $key;
    }
}

if ($error) {
    foreach ($error as $key ) {
        echo $key;
   }
}

?>

</div>



<div class="grid-notas">
<?php while ( $nota= mysqli_fetch_assoc($resultado)) :?>
   
    <div class="nota">
    <header>
        <h4><?php echo $nota['titulo'] ?></h4>
    </header>
<div class="parrafo">
    <p><?php echo $nota['contenido'] ?></p>
</div>

<footer>
    <p><?php echo $nota['fecha'] ?></p>
</footer>
<form method="POST">

    <input type="hidden" name="id" value="<?php echo $nota['id'];?>">
    <input type="submit" class="boton-e" value="Eliminar">
</form>


    </div>

<?php endwhile ;?>






</div>
<!-- fin grid notas -->

</main>