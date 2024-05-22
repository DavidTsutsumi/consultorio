<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'tsatsu');
define('DB_PASSWORD', 'hola123');
define('DB_NAME', 'consultorio');

/* Intento de conexión a la base de datos MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar conexión
if($link === false){
    die("ERROR: No se pudo conectar. " . mysqli_connect_error());
}
?>
