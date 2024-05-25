<?php
class Receta {
    private $db;
    private $table = 'Recetas';

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
        $sql = "SELECT * FROM " . $this->table . " WHERE IdReceta = ?";
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

    public function create($descripcion) {
        $sql = "INSERT INTO " . $this->table . " (Descripcion) VALUES (?)";
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $descripcion);
            if (mysqli_stmt_execute($stmt)) {
                return true;
            } else {
                die('Error en la ejecución de la consulta: ' . mysqli_error($this->db));
            }
        }
        return false;
    }

    public function update($id, $descripcion) {
        $sql = "UPDATE " . $this->table . " SET Descripcion = ? WHERE IdReceta = ?";
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $descripcion, $id);
            if (mysqli_stmt_execute($stmt)) {
                return true;
            } else {
                die('Error en la ejecución de la consulta: ' . mysqli_error($this->db));
            }
        }
        return false;
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE IdReceta = ?";
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            if (mysqli_stmt_execute($stmt)) {
                return true;
            } else {
                die('Error en la ejecución de la consulta: ' . mysqli_error($this->db));
            }
        }
        return false;
    }
}
?>
