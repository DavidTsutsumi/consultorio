<?php 
include '../component/header.php'; 
require_once '../../config.php';
require_once '../../models/Horario.php';

$horarioModel = new Horario($link);
$result = $horarioModel->getAll();
?>
<div class="container">
    <h2>Lista de Horarios</h2>
    <a href="createHorario.php" class="btn btn-primary">Agregar Horario</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Día</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['IdHorario']; ?></td>
                    <td><?php echo $row['Dia']; ?></td>
                    <td><?php echo $row['Hora']; ?></td>
                    <td><?php echo $row['Estado']; ?></td>
                    <td>
                        <a href="viewHorario.php?id=<?php echo $row['IdHorario']; ?>" class="btn btn-info">Ver</a>
                        <a href="editHorario.php?id=<?php echo $row['IdHorario']; ?>" class="btn btn-warning">Editar</a>
                        <form action="../../controllers/HorarioController.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $row['IdHorario']; ?>">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include '../component/footer.php'; ?>
