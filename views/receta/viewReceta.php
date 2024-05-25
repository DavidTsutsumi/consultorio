<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Receta.php';

$receta = new Receta($link);
$id = $_GET['id'];
$result = $receta->getById($id);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <h2>Ver Receta</h2>
    <div class="form-group">
        <label>ID</label>
        <p class="form-control"><?php echo $row['IdReceta']; ?></p>
    </div>
    <div class="form-group">
        <label>Descripción</label>
        <p class="form-control"><?php echo $row['Descripcion']; ?></p>
    </div>
    <a href="indexReceta.php" class="btn btn-primary">Volver</a>
</div>
<?php include '../component/footer.php'; ?>
