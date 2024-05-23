<?php
require_once "../config.php";
require_once "../models/Especialidad.php";

class EspecialidadController {
    private $especialidad;

    public function __construct($db) {
        $this->especialidad = new Especialidad($db);
    }

    public function index() {
        return $this->especialidad->getAll();
    }

    public function view($id) {
        return $this->especialidad->getById($id);
    }

    public function create($nombre) {
        return $this->especialidad->create($nombre);
    }

    public function edit($id, $nombre) {
        return $this->especialidad->update($id, $nombre);
    }

    public function delete($id) {
        return $this->especialidad->delete($id);
    }
}

$controller = new EspecialidadController($link);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $controller->create($_POST['nombre']);
                header("location: ../views/especialidad/indexEspecialidad.php");
                break;
            case 'edit':
                $controller->edit($_POST['id'], $_POST['nombre']);
                header("location: ../views/especialidad/indexEspecialidad.php");
                break;
            case 'delete':
                $controller->delete($_POST['id']);
                header("location: ../views/especialidad/indexEspecialidad.php");
                break;
        }
    }
}
?>
