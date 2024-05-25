<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/HistorialMedico.php';
require_once '../../models/Persona.php';

$historialMedico = new HistorialMedico($link);
$persona = new Persona($link);
$result = $historialMedico->getAll();
?>
<div class="container">
    <h2>Lista de Historiales Médicos</h2>
    <a href="createHistorialMedico.php" class="btn btn-primary">Agregar Historial Médico</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Persona</th>
                <th>Estatura (cm)</th>
                <th>Peso (kg)</th>
                <th>Tipo de Sangre</th>
                <th>Alergias</th>
                <th>Condiciones Médicas</th>
                <th>Cirugías</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <?php 
                $personaResult = $persona->getById($row['IdPersona']);
                $personaRow = mysqli_fetch_assoc($personaResult);
                ?>
                <tr>
                    <td><?php echo $row['IdHistorialMedico']; ?></td>
                    <td><?php echo $personaRow['Nombre'] . ' ' . $personaRow['ApellidoPaterno'] . ' ' . $personaRow['ApellidoMaterno']; ?></td>
                    <td><?php echo $row['Estatura']; ?></td>
                    <td><?php echo $row['Peso']; ?></td>
                    <td><?php echo $row['TipoSangre']; ?></td>
                    <td><?php echo $row['Alergias']; ?></td>
                    <td><?php echo $row['CondicionesMed']; ?></td>
                    <td><?php echo $row['Cirugias']; ?></td>
                    <td>
                        <a href="viewHistorialMedico.php?id=<?php echo $row['IdHistorialMedico']; ?>" class="btn btn-info">Ver</a>
                        <a href="editHistorialMedico.php?id=<?php echo $row['IdHistorialMedico']; ?>" class="btn btn-warning">Editar</a>
                        <form action="../../controllers/HistorialMedicoController.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $row['IdHistorialMedico']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include '../component/footer.php'; ?>
