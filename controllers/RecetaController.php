<?php
require_once "../config.php";
require_once "../models/Receta.php";

class RecetaController {
    private $receta;

    public function __construct($db) {
        $this->receta = new Receta($db);
    }

    public function index() {
        return $this->receta->getAll();
    }

    public function view($id) {
        return $this->receta->getById($id);
    }

    public function create($descripcion) {
        return $this->receta->create($descripcion);
    }

    public function edit($id, $descripcion) {
        return $this->receta->update($id, $descripcion);
    }

    public function delete($id) {
        return $this->receta->delete($id);
    }
}

$controller = new RecetaController($link);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $controller->create($_POST['descripcion']);
                header("location: ../views/receta/indexReceta.php");
                break;
            case 'edit':
                $controller->edit($_POST['id'], $_POST['descripcion']);
                header("location: ../views/receta/indexReceta.php");
                break;
            case 'delete':
                $controller->delete($_POST['id']);
                header("location: ../views/receta/indexReceta.php");
                break;
        }
    }
}
?>
