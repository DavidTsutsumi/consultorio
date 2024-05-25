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

$personaResult = $persona->getById($row['IdPersona']);
$personaRow = mysqli_fetch_assoc($personaResult);

$medicoResult = $medico->getById($row['IdMedico']);
$medicoRow = mysqli_fetch_assoc($medicoResult);
$medicoPersonaResult = $persona->getById($medicoRow['IdPersona']);
$medicoPersonaRow = mysqli_fetch_assoc($medicoPersonaResult);

$recetaResult = $receta->getById($row['IdReceta']);
$recetaRow = mysqli_fetch_assoc($recetaResult);

?>
<div class="container">
    <h2>Ver Cita</h2>
    <div class="form-group">
        <label>ID Cita</label>
        <p class="form-control"><?php echo $row['IdCita']; ?></p>
    </div>
    <div class="form-group">
        <label>Paciente</label>
        <p class="form-control"><?php echo $personaRow['Nombre'] . ' ' . $personaRow['ApellidoPaterno'] . ' ' . $personaRow['ApellidoMaterno']; ?></p>
    </div>
    <div class="form-group">
        <label>Médico</label>
        <p class="form-control"><?php echo $medicoPersonaRow['Nombre'] . ' ' . $medicoPersonaRow['ApellidoPaterno'] . ' ' . $medicoPersonaRow['ApellidoMaterno']; ?></p>
    </div>
    <div class="form-group">
        <label>Receta</label>
        <p class="form-control"><?php echo $recetaRow['Descripcion']; ?></p>
    </div>
    <div class="form-group">
        <label>Motivo</label>
        <p class="form-control"><?php echo $row['Motivo']; ?></p>
    </div>
    <div class="form-group">
        <label>Estado</label>
        <p class="form-control"><?php echo $row['Estado']; ?></p>
    </div>
   
    <a href="indexCita.php" class="btn btn-primary">Volver</a>
</div>
<?php include '../../views/component/footer.php'; ?>
