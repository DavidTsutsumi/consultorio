<?php 
include '../component/header.php'; 
require_once '../../config.php';
require_once '../../models/Usuario.php';

$usuarioModel = new Usuario($link);
$result = $usuarioModel->getAll();
?>
<div class="container">
    <h2>Lista de Usuarios</h2>
    <a href="createUsuario.php" class="btn btn-primary">Agregar Usuario</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['IdUsuario']; ?></td>
                    <td><?php echo $row['TipoUsuario']; ?></td>
                    <td>
                        <a href="viewUsuario.php?id=<?php echo $row['IdUsuario']; ?>" class="btn btn-info">Ver</a>
                        <a href="editUsuario.php?id=<?php echo $row['IdUsuario']; ?>" class="btn btn-warning">Editar</a>
                        <form action="../../controllers/UsuarioController.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $row['IdUsuario']; ?>">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include '../component/footer.php'; ?>
