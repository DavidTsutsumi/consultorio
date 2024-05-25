<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Persona.php';
require_once '../../models/Usuario.php';

$persona = new Persona($link);
$result = $persona->getAll();

$usuario = new Usuario($link);
$usuarios = $usuario->getAll();
?>
<div class="container">
    <h2>Lista de Personas</h2>
    <a href="createPersona.php" class="btn btn-primary">Agregar Persona</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Sexo</th>
                <th>Usuario</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['IdPersona']; ?></td>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['ApellidoPaterno']; ?></td>
                    <td><?php echo $row['ApellidoMaterno']; ?></td>
                    <td><?php echo $row['Sexo']; ?></td>
                    <td><?php 
                        foreach($usuarios as $usuarioRow) {
                            if ($usuarioRow['IdUsuario'] == $row['IdUsuario']) {
                                echo $usuarioRow['TipoUsuario'];
                                break;
                            }
                        }
                    ?></td>
                    <td><?php echo $row['CorreoElec']; ?></td>
                    <td><?php echo $row['Telefono']; ?></td>
                    <td>
                        <a href="viewPersona.php?id=<?php echo $row['IdPersona']; ?>" class="btn btn-info">Ver</a>
                        <a href="editPersona.php?id=<?php echo $row['IdPersona']; ?>" class="btn btn-warning">Editar</a>
                        <form action="../../controllers/PersonaController.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $row['IdPersona']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include '../component/footer.php'; ?>
