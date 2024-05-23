<?php include '../component/header.php'; ?>
<div class="container">
    <h2>Crear Horario</h2>
    <form action="../../controllers/HorarioController.php" method="post">
        <input type="hidden" name="action" value="create">
        <div class="form-group">
            <label for="dia">Día:</label>
            <input type="text" id="dia" name="dia" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php include '../component/footer.php'; ?>
