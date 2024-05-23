<?php
class Usuario {
    private $link;

    public function __construct($link) {
        $this->link = $link;
    }

    public function getAll() {
        $query = "SELECT * FROM Usuarios";
        return mysqli_query($this->link, $query);
    }

    public function getById($id) {
        $query = "SELECT * FROM Usuarios WHERE IdUsuario = $id";
        return mysqli_query($this->link, $query);
    }

    public function create($data) {
        $tipoUsuario = $data['tipo_usuario'];
        $password = $data['password'];
        $query = "INSERT INTO Usuarios (TipoUsuario, Password) VALUES ('$tipoUsuario', '$password')";
        mysqli_query($this->link, $query);
    }

    public function update($id, $data) {
        $tipoUsuario = $data['tipo_usuario'];
        $password = $data['password'];
        $query = "UPDATE Usuarios SET TipoUsuario = '$tipoUsuario', Password = '$password' WHERE IdUsuario = $id";
        mysqli_query($this->link, $query);
    }

    public function delete($id) {
        $query = "DELETE FROM Usuarios WHERE IdUsuario = $id";
        mysqli_query($this->link, $query);
    }
}
?>
