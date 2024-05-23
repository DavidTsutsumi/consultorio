<?php 
include '../component/header.php'; 
require_once '../../config.php';
require_once '../../models/Horario.php';

$horarioModel = new Horario($link);
$id = $_GET['id'];
$horario = $horarioModel->getById($id);
?>
<div class="container">
    <h2>Editar Horario</h2>
    <form action="../../controllers/HorarioController.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="dia">Día:</label>
            <input type="text" id="dia" name="dia" class="form-control" value="<?php echo $horario['Dia']; ?>" required>
        </div>
        <div class="form-group">
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" class="form-control" value="<?php echo $horario['Hora']; ?>" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" class="form-control" value="<?php echo $horario['Estado']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
<?php include '../component/footer.php'; ?>
