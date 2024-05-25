<?php 
include '../component/header.php'; 
require_once '../../config.php';
require_once '../../models/Usuario.php';
require_once '../../models/Persona.php';

$id = $_GET['id'];
$personaModel = new Persona($link);
$usuarioModel = new Usuario($link);

$personaResult = $personaModel->getById($id);
$persona = mysqli_fetch_assoc($personaResult);

$usuariosResult = $usuarioModel->getAll();
?>
<div class="container">
    <h2>Editar Persona</h2>
    <form action="../../controllers/PersonaController.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $persona['IdPersona']; ?>">
        <div class="form-group">
            <label>Usuario</label>
            <select name="idUsuario" class="form-control" required>
                <?php while($usuario = mysqli_fetch_assoc($usuariosResult)): ?>
                    <option value="<?php echo $usuario['IdUsuario']; ?>" <?php echo $usuario['IdUsuario'] == $persona['IdUsuario'] ? 'selected' : ''; ?>>
                        <?php echo $usuario['IdUsuario']; ?> - <?php echo $usuario['TipoUsuario']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $persona['Nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apellidoPaterno" class="form-control" value="<?php echo $persona['ApellidoPaterno']; ?>" required>
        </div>
        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="apellidoMaterno" class="form-control" value="<?php echo $persona['ApellidoMaterno']; ?>" required>
        </div>
        <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="fechaNac" class="form-control" value="<?php echo $persona['FechaNac']; ?>" required>
        </div>
        <div class="form-group">
            <label>Sexo (M/F)</label>
            <input type="text" name="sexo" class="form-control" value="<?php echo $persona['Sexo']; ?>" required>
        </div>
        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" name="correoElec" class="form-control" value="<?php echo $persona['CorreoElec']; ?>" required>
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo $persona['Telefono']; ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
