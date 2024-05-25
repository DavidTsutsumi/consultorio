<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Persona.php';

$persona = new Persona($link);
$id = $_GET['id'];
$result = $persona->getById($id);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <h2>Ver Persona</h2>
    <div class="form-group">
        <label>ID</label>
        <p class="form-control"><?php echo $row['IdPersona']; ?></p>
    </div>
    <div class="form-group">
        <label>Usuario</label>
        <p class="form-control"><?php echo $row['IdUsuario']; ?></p>
    </div>
    <div class="form-group">
        <label>Nombre</label>
        <p class="form-control"><?php echo $row['Nombre']; ?></p>
    </div>
    <div class="form-group">
        <label>Apellido Paterno</label>
        <p class="form-control"><?php echo $row['ApellidoPaterno']; ?></p>
    </div>
    <div class="form-group">
        <label>Apellido Materno</label>
        <p class="form-control"><?php echo $row['ApellidoMaterno']; ?></p>
    </div>
    <div class="form-group">
        <label>Fecha de Nacimiento</label>
        <p class="form-control"><?php echo $row['FechaNac']; ?></p>
    </div>
    <div class="form-group">
        <label>Sexo</label>
        <p class="form-control"><?php echo $row['Sexo']; ?></p>
    </div>
    <div class="form-group">
        <label>Correo Electrónico</label>
        <p class="form-control"><?php echo $row['CorreoElec']; ?></p>
    </div>
    <div class="form-group">
        <label>Teléfono</label>
        <p class="form-control"><?php echo $row['Telefono']; ?></p>
    </div>
    <a href="indexPersona.php" class="btn btn-primary">Volver</a>
</div>
<?php include '../../views/component/footer.php'; ?>
