<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Especialidad.php';

$especialidad = new Especialidad($link);
$result = $especialidad->getAll();
?>
<div class="container">
    <h2>Lista de Especialidades</h2>
    <a href="createEspecialidad.php" class="btn btn-primary">Agregar Especialidad</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['IdEspecialidad']; ?></td>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td>
                        <a href="viewEspecialidad.php?id=<?php echo $row['IdEspecialidad']; ?>" class="btn btn-info">Ver</a>
                        <a href="editEspecialidad.php?id=<?php echo $row['IdEspecialidad']; ?>" class="btn btn-warning">Editar</a>
                        <form action="../../controllers/EspecialidadController.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $row['IdEspecialidad']; ?>">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include '../../views/component/footer.php';  ?>
