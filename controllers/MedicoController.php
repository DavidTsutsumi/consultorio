<?php
require_once "../config.php";
require_once "../models/Medico.php";
require_once "../models/Persona.php";
require_once "../models/Usuario.php";
require_once "../models/Especialidad.php";

class MedicoController {
    private $medico;
    private $persona;
    private $usuario;
    private $especialidad;

    public function __construct($db) {
        $this->medico = new Medico($db);
        $this->persona = new Persona($db);
        $this->usuario = new Usuario($db);
        $this->especialidad = new Especialidad($db);
    }

    public function index() {
        return $this->medico->getAll();
    }

    public function view($id) {
        return $this->medico->getById($id);
    }

    public function create($idPersona, $idUsuario, $idEspecialidad, $cedulaProfesional) {
        return $this->medico->create($idPersona, $idUsuario, $idEspecialidad, $cedulaProfesional);
    }

    public function edit($id, $idPersona, $idUsuario, $idEspecialidad, $cedulaProfesional) {
        return $this->medico->update($id, $idPersona, $idUsuario, $idEspecialidad, $cedulaProfesional);
    }

    public function delete($id) {
        return $this->medico->delete($id);
    }

    public function getPersonas() {
        return $this->persona->getAll();
    }

    public function getUsuarios() {
        return $this->usuario->getAll();
    }

    public function getEspecialidades() {
        return $this->especialidad->getAll();
    }
}

$controller = new MedicoController($link);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $controller->create($_POST['idPersona'], $_POST['idUsuario'], $_POST['idEspecialidad'], $_POST['cedulaProfesional']);
                header("Location: ../views/medico/indexMedico.php");
                break;
            case 'edit':
                $controller->edit($_POST['id'], $_POST['idPersona'], $_POST['idUsuario'], $_POST['idEspecialidad'], $_POST['cedulaProfesional']);
                header("Location: ../views/medico/indexMedico.php");
                break;
            case 'delete':
                $controller->delete($_POST['id']);
                header("Location: ../views/medico/indexMedico.php");
                break;
        }
    }
}
?>
