<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Cita.php';
require_once '../../models/Persona.php';
require_once '../../models/Medico.php';
require_once '../../models/Receta.php';
require_once '../../models/Horario.php';

$cita = new Cita($link);
$persona = new Persona($link);
$medico = new Medico($link);
$receta = new Receta($link);
$horario = new Horario($link);

$id = $_GET['id'];
$result = $cita->getById($id);
$row = mysqli_fetch_assoc($result);

$personas = $persona->getAll();
$medicos = $medico->getAll();
$recetas = $receta->getAll();
$horarios = $horario->getAll();
?>
<div class="container">
    <h2>Editar Cita</h2>
    <form action="../../controllers/CitaController.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $row['IdCita']; ?>">
        <div class="form-group">
            <label>Paciente</label>
            <select name="idPersona" class="form-control" required>
                <?php while($personaRow = mysqli_fetch_assoc($personas)): ?>
                    <option value="<?php echo $personaRow['IdPersona']; ?>" <?php echo $row['IdPersona'] == $personaRow['IdPersona'] ? 'selected' : ''; ?>>
                        <?php echo $personaRow['Nombre'] . ' ' . $personaRow['ApellidoPaterno'] . ' ' . $personaRow['ApellidoMaterno']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Médico</label>
            <select name="idMedico" class="form-control" required>
                <?php while($medicoRow = mysqli_fetch_assoc($medicos)): ?>
                    <option value="<?php echo $medicoRow['IdMedico']; ?>" <?php echo $row['IdMedico'] == $medicoRow['IdMedico'] ? 'selected' : ''; ?>>
                        <?php 
                            $medicoPersona = $persona->getById($medicoRow['IdPersona']);
                            $medicoPersonaRow = mysqli_fetch_assoc($medicoPersona);
                            echo $medicoPersonaRow['Nombre'] . ' ' . $medicoPersonaRow['ApellidoPaterno'] . ' ' . $medicoPersonaRow['ApellidoMaterno']; 
                        ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Receta</label>
            <select name="idReceta" class="form-control" required>
                <?php while($recetaRow = mysqli_fetch_assoc($recetas)): ?>
                    <option value="<?php echo $recetaRow['IdReceta']; ?>" <?php echo $row['IdReceta'] == $recetaRow['IdReceta'] ? 'selected' : ''; ?>>
                        <?php echo $recetaRow['Descripcion']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Motivo</label>
            <input type="text" name="motivo" class="form-control" value="<?php echo $row['Motivo']; ?>" required>
        </div>
        <div class="form-group">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control" value="<?php echo $row['Estado']; ?>" required>
        </div>
        <div class="form-group">
            <label>Horario</label>
            <select name="idHorario" class="form-control" required>
                <?php while($horarioRow = mysqli_fetch_assoc($horarios)): ?>
                    <option value="<?php echo $horarioRow['IdHorario']; ?>">
                        <?php echo $horarioRow['Dia'] . ' - ' . $horarioRow['Hora']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
    </form>
</div>
<?php include '../../views/component/footer.php'; ?>
