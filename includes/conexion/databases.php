<?php 

function ConectarDB() {
    $db = mysqli_connect('localhost','root','','notas');

    if (!$db) {
        echo ' No se puedo conectar';

    }
    

return $db;
}



?>

