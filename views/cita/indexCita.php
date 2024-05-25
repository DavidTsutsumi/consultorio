<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Cita.php';
require_once '../../models/Persona.php';
require_once '../../models/Medico.php';
require_once '../../models/Receta.php';
require_once '../../models/Horario.php';

$cita = new Cita($link);
$result = $cita->getAll();

$persona = new Persona($link);
$personas = $persona->getAll();

$medico = new Medico($link);
$medicos = $medico->getAll();

$receta = new Receta($link);
$recetas = $receta->getAll();

$horario = new Horario($link);
$horarios = $horario->getAll();
?>
<div class="container">
    <h2>Lista de Citas</h2>
    <a href="createCita.php" class="btn btn-primary">Agregar Cita</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Cita</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Receta</th>
                <th>Motivo</th>
                <th>Estado</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['IdCita']; ?></td>
                    <td><?php 
                        foreach($personas as $personaRow) {
                            if ($personaRow['IdPersona'] == $row['IdPersona']) {
                                echo $personaRow['Nombre'] . ' ' . $personaRow['ApellidoPaterno'] . ' ' . $personaRow['ApellidoMaterno'];
                                break;
                            }
                        }
                    ?></td>
                    <td><?php 
                        foreach($medicos as $medicoRow) {
                            if ($medicoRow['IdMedico'] == $row['IdMedico']) {
                                foreach($personas as $personaRow) {
                                    if ($personaRow['IdPersona'] == $medicoRow['IdPersona']) {
                                        echo $personaRow['Nombre'] . ' ' . $personaRow['ApellidoPaterno'] . ' ' . $personaRow['ApellidoMaterno'];
                                        break;
                                    }
                                }
                                break;
                            }
                        }
                    ?></td>
                    <td><?php 
                        foreach($recetas as $recetaRow) {
                            if ($recetaRow['IdReceta'] == $row['IdReceta']) {
                                echo $recetaRow['Descripcion'];
                                break;
                            }
                        }
                    ?></td>
                    <td><?php echo $row['Motivo']; ?></td>
                    <td><?php echo $row['Estado']; ?></td>
                    <td><?php 
                        foreach($horarios as $horarioRow) {
                            if ($horarioRow['IdHorario'] == $row['IdHorario']) {
                                echo $horarioRow['Dia'] . ' - ' . $horarioRow['Hora'];
                                break;
                            }
                        }
                    ?></td>
                    <td>
                        <a href="viewCita.php?id=<?php echo $row['IdCita']; ?>" class="btn btn-info">Ver</a>
                        <a href="editCita.php?id=<?php echo $row['IdCita']; ?>" class="btn btn-warning">Editar</a>
                        <form action="../../controllers/CitaController.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $row['IdCita']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include '../component/footer.php'; ?>
