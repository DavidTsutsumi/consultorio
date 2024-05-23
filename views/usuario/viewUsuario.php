<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Usuario.php';

$usuarioModel = new Usuario($link);
$usuarios = $usuarioModel->getById($_GET['id']);
?>
<div class="container">
    <h2>Detalles del Usuario</h2>
    <?php if ($usuarios && mysqli_num_rows($usuarios) > 0): ?>
        <?php while ($usuario = mysqli_fetch_assoc($usuarios)): ?>
            <div class="form-group">
                <label>ID</label>
                <p class="form-control"><?php echo $usuario['IdUsuario']; ?></p>
            </div>
            <div class="form-group">
                <label>Usuario</label>
                <p class="form-control"><?php echo $usuario['TipoUsuario']; ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No se encontró ningún usuario con el ID proporcionado.</p>
    <?php endif; ?>
    <a href="indexUsuario.php" class="btn btn-primary">Volver</a>
</div>
<?php include '../component/footer.php'; ?>
