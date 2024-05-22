<?php
class Especialidad {
    private $db;
    private $table = 'Especialidad';

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        return mysqli_query($this->db, $sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM " . $this->table . " WHERE IdEspecialidad = ?";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            if(mysqli_stmt_execute($stmt)){
                return mysqli_stmt_get_result($stmt);
            }
        }
        return false;
    }

    public function create($nombre) {
        $sql = "INSERT INTO " . $this->table . " (Nombre) VALUES (?)";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $nombre);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }

    public function update($id, $nombre) {
        $sql = "UPDATE " . $this->table . " SET Nombre = ? WHERE IdEspecialidad = ?";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $nombre, $id);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE IdEspecialidad = ?";
        if($stmt = mysqli_prepare($this->db, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }
}
?>
