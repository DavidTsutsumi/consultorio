<?php
require_once "../config.php";
require_once "../models/Cita.php";

class CitasController
{
    private $citas;

    public function __construct($db)
    {
        $this->citas = new Cita($db);
    }

    public function index()
    {
        return $this->citas->getAll();
    }

    public function view($id)
    {
        return $this->citas->getById($id);
    }

    public function create($idPersona, $idMedico, $idReceta, $motivo, $estado, $idHorario)
    {
        if ($this->citas->create($idPersona, $idMedico, $idReceta, $motivo, $estado, $idHorario)) {
            return true;
        } else {
            die("Error al crear la cita.");
        }
    }

    public function edit($id, $idPersona, $idMedico, $idReceta, $motivo, $estado, $idHorario)
    {
        if ($this->citas->update($id, $idPersona, $idMedico, $idReceta, $motivo, $estado, $idHorario)) {
            return true;
        } else {
            die("Error al actualizar la cita.");
        }
    }

    public function delete($id)
    {
        if ($this->citas->delete($id)) {
            return true;
        } else {
            die("Error al eliminar la cita.");
        }
    }
}

$controller = new CitasController($link);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                if ($controller->create($_POST['idPersona'], $_POST['idMedico'], $_POST['idReceta'], $_POST['motivo'], $_POST['estado'], $_POST['idHorario'])) {
                    header("Location: ../views/cita/indexCita.php");
                }
                break;
            case 'edit':
                if ($controller->edit($_POST['id'], $_POST['idPersona'], $_POST['idMedico'], $_POST['idReceta'], $_POST['motivo'], $_POST['estado'], $_POST['idHorario'])) {
                    header("Location: ../views/cita/indexCita.php");
                }
                break;
            case 'delete':
                if ($controller->delete($_POST['id'])) {
                    header("Location: ../views/cita/indexCita.php");
                }
                break;
            default:
                echo "Acción no válida.";
                break;
        }
    }
}
?>
