<?php 
include '../../views/component/header.php'; 
require_once '../../config.php';
require_once '../../models/Medico.php';
require_once '../../models/Persona.php';
require_once '../../models/Usuario.php';
require_once '../../models/Especialidad.php';

$medico = new Medico($link);
$result = $medico->getAll();

$persona = new Persona($link);
$personas = $persona->getAll();

$usuario = new Usuario($link);
$usuarios = $usuario->getAll();

$especialidad = new Especialidad($link);
$especialidades = $especialidad->getAll();
?>
<div class="container">
    <h2>Lista de Médicos</h2>
    <a href="createMedico.php" class="btn btn-primary">Agregar Médico</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Médico</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Usuario</th>
                <th>Especialidad</th>
                <th>Cédula Profesional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['IdMedico']; ?></td>
                    <td><?php 
                        foreach($personas as $personaRow) {
                            if ($personaRow['IdPersona'] == $row['IdPersona']) {
                                echo $personaRow['Nombre'];
                                break;
                            }
                        }
                    ?></td>
                    <td><?php 
                        foreach($personas as $personaRow) {
                            if ($personaRow['IdPersona'] == $row['IdPersona']) {
                                echo $personaRow['ApellidoPaterno'];
                                break;
                            }
                        }
                    ?></td>
                    <td><?php 
                        foreach($personas as $personaRow) {
                            if ($personaRow['IdPersona'] == $row['IdPersona']) {
                                echo $personaRow['ApellidoMaterno'];
                                break;
                            }
                        }
                    ?></td>
                    <td><?php 
                        foreach($usuarios as $usuarioRow) {
                            if ($usuarioRow['IdUsuario'] == $row['IdUsuario']) {
                                echo $usuarioRow['TipoUsuario'];
                                break;
                            }
                        }
                    ?></td>
                    <td><?php 
                        foreach($especialidades as $especialidadRow) {
                            if ($especialidadRow['IdEspecialidad'] == $row['IdEspecialidad']) {
                                echo $especialidadRow['Nombre'];
                                break;
                            }
                        }
                    ?></td>
                    <td><?php echo $row['CedulaProfesional']; ?></td>
                    <td>
                        <a href="viewMedico.php?id=<?php echo $row['IdMedico']; ?>" class="btn btn-info">Ver</a>
                        <a href="editMedico.php?id=<?php echo $row['IdMedico']; ?>" class="btn btn-warning">Editar</a>
                        <form action="../../controllers/MedicoController.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $row['IdMedico']; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include '../component/footer.php'; ?>
