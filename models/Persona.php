<?php
class Persona {
    private $db;
    private $table = 'Personas';

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die('Error en la consulta: ' . mysqli_error($this->db));
        }
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE IdPersona = ?";
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                return $result;
            } else {
                die('Error en la ejecución de la consulta: ' . mysqli_error($this->db));
            }
        }
        return false;
    }

    public function create($idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono) {
        $sql = "INSERT INTO " . $this->table . " (IdUsuario, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNac, Sexo, CorreoElec, Telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, "isssssss", $idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }

    public function update($id, $idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono) {
        $sql = "UPDATE " . $this->table . " SET IdUsuario = ?, Nombre = ?, ApellidoPaterno = ?, ApellidoMaterno = ?, FechaNac = ?, Sexo = ?, CorreoElec = ?, Telefono = ? WHERE IdPersona = ?";
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, "isssssssi", $idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNac, $sexo, $correoElec, $telefono, $id);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE IdPersona = ?";
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }
}
?>
