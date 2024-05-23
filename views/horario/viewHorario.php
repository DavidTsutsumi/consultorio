<?php 
include '../component/header.php'; 
require_once '../../config.php';
require_once '../../models/Horario.php';

$horarioModel = new Horario($link);
$id = $_GET['id'];
$horario = $horarioModel->getById($id);
?>
<div class="container">
    <h2>Detalles del Horario</h2>
    <?php if ($horario): ?>
        <div class="form-group">
            <label>ID</label>
            <p class="form-control"><?php echo $horario['IdHorario']; ?></p>
        </div>
        <div class="form-group">
            <label>Día</label>
            <p class="form-control"><?php echo $horario['Dia']; ?></p>
        </div>
        <div class="form-group">
            <label>Hora</label>
            <p class="form-control"><?php echo $horario['Hora']; ?></p>
        </div>
        <div class="form-group">
            <label>Estado</label>
            <p class="form-control"><?php echo $horario['Estado']; ?></p>
        </div>
    <?php else: ?>
        <p>No se encontró ningún horario con el ID proporcionado.</p>
    <?php endif; ?>
    <a href="indexHorario.php" class="btn btn-primary">Volver</a>
</div>
<?php include '../component/footer.php'; ?>
