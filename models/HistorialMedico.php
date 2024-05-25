<?php
class HistorialMedico {
    private $db;
    private $table = 'HistorialMedico';

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        return mysqli_query($this->db, $sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE IdHistorialMedico = ?";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            if(mysqli_stmt_execute($stmt)){
                return mysqli_stmt_get_result($stmt);
            }
        }
        return false;
    }

    public function create($idPersona, $estatura, $peso, $tipoSangre, $alergias, $condicionesMed, $cirugias) {
        $sql = "INSERT INTO " . $this->table . " (IdPersona, Estatura, Peso, TipoSangre, Alergias, CondicionesMed, Cirugias) VALUES (?, ?, ?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "iidssss", $idPersona, $estatura, $peso, $tipoSangre, $alergias, $condicionesMed, $cirugias);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }

    public function update($id, $idPersona, $estatura, $peso, $tipoSangre, $alergias, $condicionesMed, $cirugias) {
        $sql = "UPDATE " . $this->table . " SET IdPersona = ?, Estatura = ?, Peso = ?, TipoSangre = ?, Alergias = ?, CondicionesMed = ?, Cirugias = ? WHERE IdHistorialMedico = ?";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "iidssssi", $idPersona, $estatura, $peso, $tipoSangre, $alergias, $condicionesMed, $cirugias, $id);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE IdHistorialMedico = ?";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }
}
?>
