<?php
class Medico {
    private $db;
    private $table = 'Medicos';

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        return mysqli_query($this->db, $sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE IdMedico = ?";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            if(mysqli_stmt_execute($stmt)){
                return mysqli_stmt_get_result($stmt);
            }
        }
        return false;
    }

    public function create($idPersona, $idUsuario, $idEspecialidad, $cedulaProfesional) {
        $sql = "INSERT INTO " . $this->table . " (IdPersona, IdUsuario, IdEspecialidad, CedulaProfesional) VALUES (?, ?, ?, ?)";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "iiis", $idPersona, $idUsuario, $idEspecialidad, $cedulaProfesional);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }

    public function update($id, $idPersona, $idUsuario, $idEspecialidad, $cedulaProfesional) {
        $sql = "UPDATE " . $this->table . " SET IdPersona = ?, IdUsuario = ?, IdEspecialidad = ?, CedulaProfesional = ? WHERE IdMedico = ?";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "iiisi", $idPersona, $idUsuario, $idEspecialidad, $cedulaProfesional, $id);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE IdMedico = ?";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }
}
?>
