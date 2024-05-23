<?php 
include '../component/header.php';
require_once '../../config.php';
require_once '../../models/Usuario.php';
 ?>
<div class="container">
    <h2>Crear Usuario</h2>
    <form action="../../controllers/UsuarioController.php" method="post">
        <input type="hidden" name="action" value="create">
        <div class="form-group">
            <label for="tipo_usuario">Tipo de Usuario:</label>
            <input type="text" id="tipo_usuario" name="tipo_usuario" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php include '../component/footer.php'; ?>
