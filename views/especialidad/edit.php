<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Especialidad.php';

$especialidad = new Especialidad($link);
$id = $_GET['id'];
$result = $especialidad->getById($id);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <h2>Editar Especialidad</h2>
    <form action="../../controllers/EspecialidadController.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $row['IdEspecialidad']; ?>">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $row['Nombre']; ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
