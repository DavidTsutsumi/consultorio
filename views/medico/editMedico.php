<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Medico.php';
require_once '../../models/Persona.php';
require_once '../../models/Usuario.php';
require_once '../../models/Especialidad.php';

$medico = new Medico($link);
$persona = new Persona($link);
$usuario = new Usuario($link);
$especialidad = new Especialidad($link);

$id = $_GET['id'];
$result = $medico->getById($id);
$row = mysqli_fetch_assoc($result);

$personas = $persona->getAll();
$usuarios = $usuario->getAll();
$especialidades = $especialidad->getAll();
?>
<div class="container">
    <h2>Editar Médico</h2>
    <form action="../../controllers/MedicoController.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $row['IdMedico']; ?>">
        <div class="form-group">
            <label>Persona</label>
            <select name="idPersona" class="form-control" required>
                <?php while($personaRow = mysqli_fetch_assoc($personas)): ?>
                    <option value="<?php echo $personaRow['IdPersona']; ?>" <?php echo $row['IdPersona'] == $personaRow['IdPersona'] ? 'selected' : ''; ?>>
                        <?php echo $personaRow['Nombre'] . ' ' . $personaRow['ApellidoPaterno'] . ' ' . $personaRow['ApellidoMaterno']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Usuario</label>
            <select name="idUsuario" class="form-control" required>
                <?php while($usuarioRow = mysqli_fetch_assoc($usuarios)): ?>
                    <option value="<?php echo $usuarioRow['IdUsuario']; ?>" <?php echo $row['IdUsuario'] == $usuarioRow['IdUsuario'] ? 'selected' : ''; ?>>
                        <?php echo $usuarioRow['TipoUsuario']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Especialidad</label>
            <select name="idEspecialidad" class="form-control" required>
                <?php while($especialidadRow = mysqli_fetch_assoc($especialidades)): ?>
                    <option value="<?php echo $especialidadRow['IdEspecialidad']; ?>" <?php echo $row['IdEspecialidad'] == $especialidadRow['IdEspecialidad'] ? 'selected' : ''; ?>>
                        <?php echo $especialidadRow['Nombre']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Cédula Profesional</label>
            <input type="text" name="cedulaProfesional" class="form-control" value="<?php echo $row['CedulaProfesional']; ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
