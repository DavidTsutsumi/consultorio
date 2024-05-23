<?php
require_once "../config.php";
require_once "../models/Usuario.php";

class UsuarioController {
    private $usuario;

    public function __construct($db) {
        $this->usuario = new Usuario($db);
    }

    public function index() {
        return $this->usuario->getAll();
    }

    public function view($id) {
        return $this->usuario->getById($id);
    }

    public function create($data) {
        return $this->usuario->create($data);
    }

    public function edit($id, $data) {
        return $this->usuario->update($id, $data);
    }

    public function delete($id) {
        return $this->usuario->delete($id);
    }
}

$controller = new UsuarioController($link);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $data = array(
                    'tipo_usuario' => $_POST['tipo_usuario'],
                    'password' => $_POST['password']
                );
                $controller->create($data);
                header("location: ../views/usuario/indexUsuario.php");
                break;
            case 'edit':
                $data = array(
                    'tipo_usuario' => $_POST['tipo_usuario'],
                    'password' => $_POST['password']
                );
                $controller->edit($_POST['id'], $data);
                header("location: ../views/usuario/indexUsuario.php");
                break;
            case 'delete':
                $controller->delete($_POST['id']);
                header("location: ../views/usuario/indexUsuario.php");
                break;
        }
    }
}
?>
