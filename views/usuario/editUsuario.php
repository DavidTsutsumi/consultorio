<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Usuario.php';

$usuario = new Usuario($link);
$id = $_GET['id'];
$result = $usuario->getById($id);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <h2>Editar Usuario</h2>
    <form action="../../controllers/UsuarioController.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $row['IdUsuario']; ?>">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="tipo_usuario" class="form-control" value="<?php echo $row['TipoUsuario']; ?>" required>
            <label>Contraseña</label>
            <input type="text" name="password" class="form-control" value="<?php echo $row['Password']; ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
