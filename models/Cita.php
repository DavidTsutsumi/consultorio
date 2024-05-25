<?php
class Cita
{
    private $db;
    private $table = 'Citas';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            die('Error en la consulta: ' . mysqli_error($this->db));
        }
        return $result;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE IdCita = ?";
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

    public function create($idPersona, $idMedico, $idReceta, $motivo, $estado, $idHorario)
    {
        $sql = "INSERT INTO " . $this->table . " (IdPersona, IdMedico, IdReceta, Motivo, Estado, IdHorario) VALUES (?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, "iiissi", $idPersona, $idMedico, $idReceta, $motivo, $estado, $idHorario);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }

    public function update($id, $idPersona, $idMedico, $idReceta, $motivo, $estado, $idHorario)
    {
        $sql = "UPDATE " . $this->table . " SET IdPersona = ?, IdMedico = ?, IdReceta = ?, Motivo = ?, Estado = ?, IdHorario = ? WHERE IdCita = ?";
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, "iiissii", $idPersona, $idMedico, $idReceta, $motivo, $estado, $idHorario, $id);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE IdCita = ?";
        if ($stmt = mysqli_prepare($this->db, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            return mysqli_stmt_execute($stmt);
        }
        return false;
    }
}
?>
