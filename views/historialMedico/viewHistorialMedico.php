<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/HistorialMedico.php';
require_once '../../models/Persona.php';

$historialMedico = new HistorialMedico($link);
$persona = new Persona($link);

$id = $_GET['id'];
$result = $historialMedico->getById($id);
$row = mysqli_fetch_assoc($result);

$personaResult = $persona->getById($row['IdPersona']);
$personaRow = mysqli_fetch_assoc($personaResult);
?>
<div class="container">
    <h2>Ver Historial Médico</h2>
    <div class="form-group">
        <label>ID Historial Médico</label>
        <p class="form-control"><?php echo $row['IdHistorialMedico']; ?></p>
    </div>
    <div class="form-group">
        <label>Persona</label>
        <p class="form-control"><?php echo $personaRow['Nombre'] . ' ' . $personaRow['ApellidoPaterno'] . ' ' . $personaRow['ApellidoMaterno']; ?></p>
    </div>
    <div class="form-group">
        <label>Estatura (cm)</label>
        <p class="form-control"><?php echo $row['Estatura']; ?></p>
    </div>
    <div class="form-group">
        <label>Peso (kg)</label>
        <p class="form-control"><?php echo $row['Peso']; ?></p>
    </div>
    <div class="form-group">
        <label>Tipo de Sangre</label>
        <p class="form-control"><?php echo $row['TipoSangre']; ?></p>
    </div>
    <div class="form-group">
        <label>Alergias</label>
        <p class="form-control"><?php echo $row['Alergias']; ?></p>
    </div>
    <div class="form-group">
        <label>Condiciones Médicas</label>
        <p class="form-control"><?php echo $row['CondicionesMed']; ?></p>
    </div>
    <div class="form-group">
        <label>Cirugías</label>
        <p class="form-control"><?php echo $row['Cirugias']; ?></p>
    </div>
    <a href="indexHistorialMedico.php" class="btn btn-primary">Volver</a>
</div>
<?php include '../component/footer.php'; ?>
