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
    <h2>Ver Especialidad</h2>
    <div class="form-group">
        <label>ID</label>
        <p class="form-control"><?php echo $row['IdEspecialidad']; ?></p>
    </div>
    <div class="form-group">
        <label>Nombre</label>
        <p class="form-control"><?php echo $row['Nombre']; ?></p>
    </div>
    <a href="index.php" class="btn btn-primary">Volver</a>
</div>
<?php include '../component/footer.php'; ?>
