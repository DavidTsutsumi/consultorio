<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Receta.php';

$receta = new Receta($link);
$result = $receta->getAll();
?>
<div class="container">
    <h2>Lista de Recetas</h2>
    <a href="createReceta.php" class="btn btn-primary">Agregar Receta</a>
    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['IdReceta']; ?></td>
                        <td><?php echo $row['Descripcion']; ?></td>
                        <td>
                            <a href="viewReceta.php?id=<?php echo $row['IdReceta']; ?>" class="btn btn-info">Ver</a>
                            <a href="editReceta.php?id=<?php echo $row['IdReceta']; ?>" class="btn btn-warning">Editar</a>
                            <form action="../../controllers/RecetaController.php" method="post" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $row['IdReceta']; ?>">
                                <input type="submit" class="btn btn-danger" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay recetas disponibles.</p>
    <?php endif; ?>
</div>
<?php include '../../views/component/footer.php';  ?>
