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

$personaResult = $persona->getById($row['IdPersona']);
$personaRow = mysqli_fetch_assoc($personaResult);

$usuarioResult = $usuario->getById($row['IdUsuario']);
$usuarioRow = mysqli_fetch_assoc($usuarioResult);

$especialidadResult = $especialidad->getById($row['IdEspecialidad']);
$especialidadRow = mysqli_fetch_assoc($especialidadResult);
?>
<div class="container">
    <h2>Ver Médico</h2>
    <div class="form-group">
        <label>ID Médico</label>
        <p class="form-control"><?php echo $row['IdMedico']; ?></p>
    </div>
    <div class="form-group">
        <label>Nombre</label>
        <p class="form-control"><?php echo $personaRow['Nombre']; ?></p>
    </div>
    <div class="form-group">
        <label>Apellido Paterno</label>
        <p class="form-control"><?php echo $personaRow['ApellidoPaterno']; ?></p>
    </div>
    <div class="form-group">
        <label>Apellido Materno</label>
        <p class="form-control"><?php echo $personaRow['ApellidoMaterno']; ?></p>
    </div>
    <div class="form-group">
        <label>Usuario</label>
        <p class="form-control"><?php echo $usuarioRow['TipoUsuario']; ?></p>
    </div>
    <div class="form-group">
        <label>Especialidad</label>
        <p class="form-control"><?php echo $especialidadRow['Nombre']; ?></p>
    </div>
    <div class="form-group">
        <label>Cédula Profesional</label>
        <p class="form-control"><?php echo $row['CedulaProfesional']; ?></p>
    </div>
    <a href="indexMedico.php" class="btn btn-primary">Volver</a>
</div>
<?php include '../component/footer.php'; ?>
