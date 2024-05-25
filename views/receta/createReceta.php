<?php include '../component/header.php'; ?>
<div class="container">
    <h2>Crear Receta</h2>
    <form action="../../controllers/RecetaController.php" method="post">
        <input type="hidden" name="action" value="create">
        <div class="form-group">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Crear">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
