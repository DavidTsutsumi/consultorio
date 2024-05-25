<?php 
include '../component/header.php'; 
require_once '../../config.php';
require_once '../../models/Persona.php';
require_once '../../models/Usuario.php';

$id = $_GET['id']; // Obtén el ID de la persona a editar

$persona = new Persona($link);
$personaData = $persona->getById($id);
$personaRow = mysqli_fetch_assoc($personaData);

$usuario = new Usuario($link);
$result = $usuario->getAll();
?>
<div class="container">
    <h2>Editar Persona</h2>
    <form action="../../controllers/PersonaController.php" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="<?php echo $personaRow['IdPersona']; ?>">
        <div class="form-group">
            <label>Usuario</label>
            <select name="idUsuario" class="form-control" required>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <option value="<?php echo $row['IdUsuario']; ?>" <?php if($row['IdUsuario'] == $personaRow['IdUsuario']) echo 'selected'; ?>>
                        <?php echo $row['IdUsuario']; ?> - <?php echo $row['TipoUsuario']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $personaRow['Nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apellidoPaterno" class="form-control" value="<?php echo $personaRow['ApellidoPaterno']; ?>" required>
        </div>
        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="apellidoMaterno" class="form-control" value="<?php echo $personaRow['ApellidoMaterno']; ?>" required>
        </div>
        <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="fechaNac" class="form-control" value="<?php echo $personaRow['FechaNac']; ?>" required>
        </div>
        <div class="form-group">
            <label>Sexo (M/F)</label>
            <input type="text" name="sexo" class="form-control" value="<?php echo $personaRow['Sexo']; ?>" required>
        </div>
        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" name="correoElec" class="form-control" value="<?php echo $personaRow['CorreoElec']; ?>" required>
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo $personaRow['Telefono']; ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>
    </form>
</div>
<?php include '../component/footer.php'; ?>
