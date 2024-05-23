<?php

class Horario {
    private $link;

    public function __construct($link) {
        $this->link = $link;
    }

    public function getAll() {
        $query = "SELECT * FROM Horarios";
        return mysqli_query($this->link, $query);
    }

    public function getById($id) {
        $query = "SELECT * FROM Horarios WHERE IdHorario = $id";
        $result = mysqli_query($this->link, $query);
        return mysqli_fetch_assoc($result);
    }

    public function create($data) {
        $dia = $data['dia'];
        $hora = $data['hora'];
        $estado = $data['estado'];
        $query = "INSERT INTO Horarios (Dia, Hora, Estado) VALUES ('$dia', '$hora', '$estado')";
        mysqli_query($this->link, $query);
    }

    public function update($id, $data) {
        $dia = $data['dia'];
        $hora = $data['hora'];
        $estado = $data['estado'];
        $query = "UPDATE Horarios SET Dia = '$dia', Hora = '$hora', Estado = '$estado' WHERE IdHorario = $id";
        mysqli_query($this->link, $query);
    }

    public function delete($id) {
        $query = "DELETE FROM Horarios WHERE IdHorario = $id";
        mysqli_query($this->link, $query);
    }
}

?>
