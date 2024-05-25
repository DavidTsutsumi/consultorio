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

$personas = $persona->getAll();
?>
<div class="container">
    <h2>Editar Historial Médico</h2>
    <form action="../../controllers/HistorialMedicoController.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $row['IdHistorialMedico']; ?>">
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
            <label>Estatura (cm)</label>
            <input type="number" step="0.01" name="estatura" class="form-control" value="<?php echo number_format($row['Estatura'], 2); ?>" required>
        </div>
        <div class="form-group">
            <label>Peso (kg)</label>
            <input type="number" step="0.01" name="peso" class="form-control" value="<?php echo number_format($row['Peso'], 2); ?>" required>
        </div>
        <div class="form-group">
            <label>Tipo de Sangre</label>
            <input type="text" name="tipoSangre" class="form-control" value="<?php echo $row['TipoSangre']; ?>" required>
        </div>
        <div class="form-group">
            <label>Alergias</label>
            <input type="text" name="alergias" class="form-control" value="<?php echo $row['Alergias']; ?>">
        </div>
        <div class="form-group">
            <label>Condiciones Médicas</label>
            <input type="text" name="condicionesMed" class="form-control" value="<?php echo $row['CondicionesMed']; ?>">
        </div>
        <div class="form-group">
            <label>Cirugías</label>
            <input type="text" name="cirugias" class="form-control" value="<?php echo $row['Cirugias']; ?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
