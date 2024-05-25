<?php
require_once "../config.php";
require_once "../models/HistorialMedico.php";

class HistorialMedicoController {
    private $historialMedico;

    public function __construct($db) {
        $this->historialMedico = new HistorialMedico($db);
    }

    public function index() {
        return $this->historialMedico->getAll();
    }

    public function view($id) {
        return $this->historialMedico->getById($id);
    }

    public function create($idPersona, $estatura, $peso, $tipoSangre, $alergias, $condicionesMed, $cirugias) {
        return $this->historialMedico->create($idPersona, $estatura, $peso, $tipoSangre, $alergias, $condicionesMed, $cirugias);
    }

    public function edit($id, $idPersona, $estatura, $peso, $tipoSangre, $alergias, $condicionesMed, $cirugias) {
        return $this->historialMedico->update($id, $idPersona, $estatura, $peso, $tipoSangre, $alergias, $condicionesMed, $cirugias);
    }

    public function delete($id) {
        return $this->historialMedico->delete($id);
    }
}

$controller = new HistorialMedicoController($link);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $controller->create($_POST['idPersona'], $_POST['estatura'], $_POST['peso'], $_POST['tipoSangre'], $_POST['alergias'], $_POST['condicionesMed'], $_POST['cirugias']);
                header("location: ../views/historialMedico/indexHistorialMedico.php");
                break;
            case 'edit':
                $controller->edit($_POST['id'], $_POST['idPersona'], $_POST['estatura'], $_POST['peso'], $_POST['tipoSangre'], $_POST['alergias'], $_POST['condicionesMed'], $_POST['cirugias']);
                header("location: ../views/historialMedico/indexHistorialMedico.php");
                break;
            case 'delete':
                $controller->delete($_POST['id']);
                header("location: ../views/historialMedico/indexHistorialMedico.php");
                break;
        }
    }
}
?>
