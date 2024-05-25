<?php 
include '../component/header.php'; 
require_once '../../config.php';
require_once '../../models/Usuario.php';

$usuario = new Usuario($link);
$result = $usuario->getAll();
?>
<div class="container">
    <h2>Crear Persona</h2>
    <form action="../../controllers/PersonaController.php" method="post">
        <input type="hidden" name="action" value="create">
        <div class="form-group">
            <label>Usuario</label>
            <select name="idUsuario" class="form-control" required>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <option value="<?php echo $row['IdUsuario']; ?>"><?php echo $row['IdUsuario']; ?> - <?php echo $row['TipoUsuario']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apellidoPaterno" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="apellidoMaterno" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="fechaNac" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Sexo (M/F)</label>
            <input type="text" name="sexo" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" name="correoElec" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Crear">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
