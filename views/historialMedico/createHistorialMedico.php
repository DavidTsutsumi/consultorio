<?php 
include '../component/header.php'; 
require_once '../../config.php';
require_once '../../models/Persona.php';

$persona = new Persona($link);
$personas = $persona->getAll();
?>
<div class="container">
    <h2>Crear Historial Médico</h2>
    <form action="../../controllers/HistorialMedicoController.php" method="post">
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
            <label>Estatura</label>
            <input type="number" step="0.01" name="estatura" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Peso</label>
            <input type="number" step="0.01" name="peso" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tipo de Sangre</label>
            <input type="text" name="tipoSangre" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Alergias</label>
            <input type="text" name="alergias" class="form-control">
        </div>
        <div class="form-group">
            <label>Condiciones Médicas</label>
            <input type="text" name="condicionesMed" class="form-control">
        </div>
        <div class="form-group">
            <label>Cirugías</label>
            <input type="text" name="cirugias" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Crear">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
