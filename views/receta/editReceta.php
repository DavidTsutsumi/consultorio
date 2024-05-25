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
    <h2>Editar Receta</h2>
    <form action="../../controllers/RecetaController.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $row['IdReceta']; ?>">
        <div class="form-group">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="<?php echo $row['Descripcion']; ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
