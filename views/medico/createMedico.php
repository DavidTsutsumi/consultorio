<?php 
include '../component/header.php'; 
require_once '../../config.php';
require_once '../../models/Persona.php';
require_once '../../models/Usuario.php';
require_once '../../models/Especialidad.php';

$persona = new Persona($link);
$personas = $persona->getAll();

$usuario = new Usuario($link);
$usuarios = $usuario->getAll();

$especialidad = new Especialidad($link);
$especialidades = $especialidad->getAll();
?>
<div class="container">
    <h2>Crear Médico</h2>
    <form action="../../controllers/MedicoController.php" method="post">
        <input type="hidden" name="action" value="create">
        <div class="form-group">
            <label>Persona</label>
            <select name="idPersona" class="form-control" required>
                <?php while($personaRow = mysqli_fetch_assoc($personas)): ?>
                    <option value="<?php echo $personaRow['IdPersona']; ?>">
                        <?php echo $personaRow['Nombre'] . ' ' . $personaRow['ApellidoPaterno'] . ' ' . $personaRow['ApellidoMaterno']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Usuario</label>
            <select name="idUsuario" class="form-control" required>
                <?php while($usuarioRow = mysqli_fetch_assoc($usuarios)): ?>
                    <option value="<?php echo $usuarioRow['IdUsuario']; ?>">
                        <?php echo $usuarioRow['TipoUsuario']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Especialidad</label>
            <select name="idEspecialidad" class="form-control" required>
                <?php while($especialidadRow = mysqli_fetch_assoc($especialidades)): ?>
                    <option value="<?php echo $especialidadRow['IdEspecialidad']; ?>">
                        <?php echo $especialidadRow['Nombre']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Cédula Profesional</label>
            <input type="text" name="cedulaProfesional" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Crear">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
