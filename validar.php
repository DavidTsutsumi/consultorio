<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $conexion = mysqli_connect("localhost", "tsatsu", "hola123", "consultorio");

    // Evitar inyección de SQL utilizando consultas preparadas
    $consulta = "SELECT * FROM Usuarios WHERE TipoUsuario=? AND Password=?";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $contraseña);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $filas = mysqli_stmt_num_rows($stmt);

    if ($filas == 1) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("location: home.php");
        exit();
    } else {
        // Mensaje de error genérico para evitar revelar información sobre las credenciales
        $error_message = "Credenciales inválidas";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
}
?>

<?php include("index.php"); ?>
<h1 class="bad"><?= isset($error_message) ? $error_message : "" ?></h1>
