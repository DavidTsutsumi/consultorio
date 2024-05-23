<?php
require_once "../config.php";
require_once "../models/Horario.php";

class HorarioController {
    private $horario;

    public function __construct($db) {
        $this->horario = new Horario($db);
    }

    public function index() {
        return $this->horario->getAll();
    }

    public function view($id) {
        return $this->horario->getById($id);
    }

    public function create($data) {
        return $this->horario->create($data);
    }

    public function edit($id, $data) {
        return $this->horario->update($id, $data);
    }

    public function delete($id) {
        return $this->horario->delete($id);
    }
}

$controller = new HorarioController($link);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $controller->create($_POST);
                header("location: ../views/horario/indexHorario.php");
                break;
            case 'edit':
                $controller->edit($_POST['id'], $_POST);
                header("location: ../views/horario/indexHorario.php");
                break;
            case 'delete':
                $controller->delete($_POST['id']);
                header("location: ../views/horario/indexHorario.php");
                break;
        }
    }
}

?>
