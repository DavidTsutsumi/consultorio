<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Persona.php';
require_once '../../models/Usuario.php';

$persona = new Persona($link);
$usuario = new Usuario($link);
$id = $_GET['id'];
$result = $persona->getById($id);
$row = mysqli_fetch_assoc($result);

$usuarios = $usuario->getAll();
?>
<div class="container">
    <h2>Editar Persona</h2>
    <form action="../../controllers/PersonaController.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $row['IdPersona']; ?>">
        <div class="form-group">
            <label>Usuario</label>
            <select name="idUsuario" class="form-control" required>
                <?php while($usuarioRow = mysqli_fetch_assoc($usuarios)): ?>
                    <option value="<?php echo $usuarioRow['IdUsuario']; ?>" <?php if ($usuarioRow['IdUsuario'] == $row['IdUsuario']) echo 'selected'; ?>><?php echo $usuarioRow['IdUsuario']; ?> - <?php echo $usuarioRow['TipoUsuario']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $row['Nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apellidoPaterno" class="form-control" value="<?php echo $row['ApellidoPaterno']; ?>" required>
        </div>
        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="apellidoMaterno" class="form-control" value="<?php echo $row['ApellidoMaterno']; ?>" required>
        </div>
        <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="fechaNac" class="form-control" value="<?php echo $row['FechaNac']; ?>" required>
        </div>
        <div class="form-group">
            <label>Sexo (M/F)</label>
            <input type="text" name="sexo" class="form-control" value="<?php echo $row['Sexo']; ?>" required>
        </div>
        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" name="correoElec" class="form-control" value="<?php echo $row['CorreoElec']; ?>" required>
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo $row['Telefono']; ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
