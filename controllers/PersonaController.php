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

    public function create($idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono)
    {
        if ($this->persona->create($idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono)) {
            return true;
        } else {
            die("Error al crear la persona.");
        }
    }

    public function edit($id, $idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono)
    {
        if ($this->persona->update($id, $idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono)) {
            return true;
        } else {
            die("Error al actualizar la persona.");
        }
    }

    public function delete($id)
    {
        if ($this->persona->delete($id)) {
            return true;
        } else {
            die("Error al eliminar la persona.");
        }
    }

    public function getUsuarios()
    {
        return $this->persona->getAllWithTipoUsuario();
    }
}

