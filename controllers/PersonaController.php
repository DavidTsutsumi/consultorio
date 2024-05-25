<?php
require_once "../config.php";
require_once "../models/Persona.php";
require_once "../models/Usuario.php";

class PersonaController {
    private $persona;
    private $usuario;

    public function __construct($db) {
        $this->persona = new Persona($db);
        $this->usuario = new Usuario($db);
    }

    public function index() {
        return $this->persona->getAll();
    }

    public function view($id) {
        return $this->persona->getById($id);
    }

    public function create($idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono) {
        if ($this->persona->create($idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono)) {
            return true;
        } else {
            die("Error al crear la persona.");
        }
    }

    public function edit($id, $idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono) {
        if ($this->persona->update($id, $idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono)) {
            return true;
        } else {
            die("Error al actualizar la persona.");
        }
    }

    public function delete($id) {
        if ($this->persona->delete($id)) {
            return true;
        } else {
            die("Error al eliminar la persona.");
        }
    }

    public function getUsuarios() {
        return $this->usuario->getAll();
    }
}

$controller = new PersonaController($link);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                if ($controller->create($_POST['idUsuario'], $_POST['nombre'], $_POST['apellidoPaterno'], $_POST['apellidoMaterno'], $_POST['fechaNac'], $_POST['sexo'], $_POST['correoElec'], $_POST['telefono'])) {
                    header("Location: ../views/persona/indexPersona.php");
                }
                break;
            case 'edit':
                if ($controller->edit($_POST['id'], $_POST['idUsuario'], $_POST['nombre'], $_POST['apellidoPaterno'], $_POST['apellidoMaterno'], $_POST['fechaNac'], $_POST['sexo'], $_POST['correoElec'], $_POST['telefono'])) {
                    header("Location: ../views/persona/indexPersona.php");
                }
                break;
            case 'delete':
                if ($controller->delete($_POST['id'])) {
                    header("Location: ../views/persona/indexPersona.php");
                }
                break;
        }
    }
}
?>
