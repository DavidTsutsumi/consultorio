<?php
require_once "../config.php";
require_once "../models/Persona.php";
require_once "../models/Usuario.php";

class PersonaController
{
    private $persona;
    private $usuario;

    public function __construct($db)
    {
        $this->persona = new Persona($db);
        $this->usuario = new Usuario($db);
    }

    public function index()
    {
        return $this->persona->getAll();
    }

    public function view($id)
    {
        return $this->persona->getById($id);
    }

    public function create($data)
    {
        return $this->persona->create(
            $data['idUsuario'], 
            $data['nombre'], 
            $data['apellidoPaterno'], 
            $data['apellidoMaterno'], 
            $data['fechaNac'], 
            $data['sexo'], 
            $data['correoElec'], 
            $data['telefono']
        );
    }

    public function edit($id, $data)
    {
        return $this->persona->update(
            $id, 
            $data['idUsuario'], 
            $data['nombre'], 
            $data['apellidoPaterno'], 
            $data['apellidoMaterno'], 
            $data['fechaNac'], 
            $data['sexo'], 
            $data['correoElec'], 
            $data['telefono']
        );
    }

    public function delete($id)
    {
        return $this->persona->delete($id);
    }

    public function getUsuarios()
    {
        return $this->usuario->getAll();
    }
}

// Manejo del formulario POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $controller = new PersonaController($link);

    switch ($action) {
        case 'create':
            $data = $_POST;
            if ($controller->create($data)) {
           
                header("Location: ../views/persona/indexPersona.php");
                exit; 
            } else {
                die("Error al crear la persona.");
            }
            break;

        case 'edit':
            $data = $_POST;
            $id = $_POST['id'];
            if ($controller->edit($id, $data)) {
                
                header("Location: ../views/persona/indexPersona.php");
                exit; 
            } else {
                die("Error al editar la persona.");
            }
            break;
       
    }
}
?>
